<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\kelas;
use App\Models\ThAjaran;
use App\Models\Nilai;
use App\Models\Murid;
use App\Models\Mapel;
use App\Models\Rapor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\User as Usernya;
use App\Models\RoleAssignment;
use Illuminate\Support\Facades\Auth;
use Excel;
use Illuminate\Support\Facades\File;
use App\Exports\MitraExport;
use illuminate\Support\Str;

class NilaiController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:nilai_show', ['only' => 'index']);
        $this->middleware('permission:nilai_create', ['only' => 'create']);
        $this->middleware('permission:nilai_delete', ['only' => 'delete']);
        $this->middleware('permission:nilai_update', ['only' => 'update']);
    }
    public function index()
    {
        $rolenm = DB::table('roles')->where('id', Auth()->user()->role)->first();
        $assignrole = $rolenm->name;
        $user = Usernya::all()->where('id', Auth()->user()->id)->first()->syncRoles($assignrole);
        $users = DB::table('users')->get();
        $role = DB::table('roles')->get();
        $tabelRole =  Role::all();
        $roleAssignment = RoleAssignment::all();
        $nilai = Nilai::all();
        $kelas = Kelas::all();
        $murid = Murid::all();

        return view('dashboard.nilai.index', compact(
            'users',
            'role',
            'tabelRole',
            'roleAssignment',
            'nilai',
            'kelas',
            'murid'
        ));
    }

    public function kelas($id)
    {
        $rolenm = DB::table('roles')->where('id', Auth()->user()->role)->first();
        $assignrole = $rolenm->name;
        $user = Usernya::all()->where('id', Auth()->user()->id)->first()->syncRoles($assignrole);
        $users = DB::table('users')->get();
        $role = DB::table('roles')->get();
        $tabelRole =  Role::all();
        $roleAssignment = RoleAssignment::all();
        $kelas = Kelas::findOrFail($id);

        $murid = Murid::where('id_kelas', $id)->get();

        return view('dashboard.nilai.kelas', compact(
            'users',
            'role',
            'tabelRole',
            'roleAssignment',
            'kelas',
            'murid'
        ));
    }

    public function murid(Request $request, $id)
    {
        $rolenm = DB::table('roles')->where('id', Auth()->user()->role)->first();
        $assignrole = $rolenm->name;
        $user = Usernya::all()->where('id', Auth()->user()->id)->first()->syncRoles($assignrole);
        $users = DB::table('users')->get();
        $role = DB::table('roles')->get();
        $tabelRole =  Role::all();
        $roleAssignment = RoleAssignment::all();
        $murid = Murid::findOrFail($id);
        $mapel = Mapel::all();
        $thAjaran = ThAjaran::all();

        // 🔥 FILTER TAHUN AJARAN
        $query = Nilai::with(['get_mapel', 'get_th_ajaran'])
            ->where('id_murid', $id);
        if ($request->filter_th_ajaran) {
            $query->where('id_th_ajaran', $request->filter_th_ajaran);
        }
        $nilai = $query->get();

        return view('dashboard.nilai.murid', compact(
            'users',
            'role',
            'tabelRole',
            'roleAssignment',
            'murid',
            'nilai',
            'mapel',
            'thAjaran'
        ));
    }

    public function generateRapor(Request $request)
    {
        // ROLE SYSTEM
        $rolenm = DB::table('roles')->where('id', Auth()->user()->role)->first();
        $assignrole = $rolenm->name;
        $user = Usernya::where('id', Auth()->user()->id)->first()->syncRoles($assignrole);

        // DATA RAPOR
        $idMurid = $request->id_murid;
        $idTh = $request->id_th_ajaran;

        $nilai = Nilai::where('id_murid', $idMurid)
            ->where('id_th_ajaran', $idTh)
            ->get();

        if ($nilai->isEmpty()) {
            return back()->with('error', 'Data nilai tidak ditemukan');
        }

        $grouped = $nilai->groupBy('id_mapel');

        foreach ($grouped as $mapelId => $items) {

            if (!$mapelId) continue;

            // RATA-RATA
            $harian = $items->where('jenis_nilai', 'tugas')->avg('nilai') ?? 0;
            $uts    = $items->where('jenis_nilai', 'uts')->avg('nilai') ?? 0;
            $uas    = $items->where('jenis_nilai', 'uas')->avg('nilai') ?? 0;

            // HITUNG NILAI AKHIR (BOBOT)
            $nilaiAkhir = ($harian * 0.5) + ($uts * 0.2) + ($uas * 0.3);

            // KKM
            $kkm = 78;

            // PREDIKAT BERDASARKAN KKM
            if ($nilaiAkhir >= 90) {
                $predikat = 'A';
                $deskripsi = 'Sangat Baik';
            } elseif ($nilaiAkhir >= 85) {
                $predikat = 'B';
                $deskripsi = 'Baik';
            } elseif ($nilaiAkhir >= $kkm) {
                $predikat = 'C';
                $deskripsi = 'Cukup';
            } else {
                $predikat = 'D';
                $deskripsi = 'Perlu Bimbingan';
            }

            Rapor::updateOrCreate(
                [
                    'id_murid' => $idMurid,
                    'id_th_ajaran' => $idTh,
                    'id_mapel' => $mapelId,
                ],
                [
                    'nilai_akhir' => round($nilaiAkhir),
                    'predikat' => $predikat,
                    'deskripsi' => $deskripsi,
                ]
            );
        }

        return redirect('/nilai/rapor/' . $idMurid . '?th_ajaran=' . $idTh)
            ->with('success', 'Rapor berhasil digenerate');
    }

    public function rapor(Request $request, $id)
    {
        // 🔥 ROLE SYSTEM
        $rolenm = DB::table('roles')->where('id', Auth()->user()->role)->first();
        $assignrole = $rolenm->name;
        $user = Usernya::where('id', Auth()->user()->id)->first()->syncRoles($assignrole);

        $users = DB::table('users')->get();
        $role = DB::table('roles')->get();
        $tabelRole = Role::all();
        $roleAssignment = RoleAssignment::all();

        // 🔥 DATA RAPOR
        $th = $request->th_ajaran;

        $murid = Murid::findOrFail($id);

        $rapor = Rapor::with('mapel')
            ->where('id_murid', $id)
            ->where('id_th_ajaran', $th)
            ->get();

        $thAjaran = ThAjaran::find($th);

        return view('dashboard.nilai.rapor', compact(
            'users',
            'role',
            'tabelRole',
            'roleAssignment',
            'murid',
            'rapor',
            'thAjaran'
        ));
    }

    // public function addNew()
    // {
    //     $rolenm = DB::table('roles')->where('id', Auth()->user()->role)->first();
    //     $assignrole = $rolenm->name;
    //     $user = Usernya::all()->where('id', Auth()->user()->id)->first()->syncRoles($assignrole);
    //     $users = DB::table('users')->get();
    //     $role = DB::table('roles')->get();
    //     $tabelRole =  Role::all();
    //     $roleAssignment = RoleAssignment::all();
    //     $nilai = Nilai::all();
    //     $walikelas = Guru::all();

    //     return view('dashboard.nilai.create', compact(
    //         'users',
    //         'role',
    //         'tabelRole',
    //         'roleAssignment',
    //         'nilai',
    //         'walikelas'
    //     ));
    // }

    public function create(Request $request)
    {
        // save the input to database
        $addProduk = Nilai::create([
            'id_murid' => $request->id_murid,
            'id_mapel' => $request->id_mapel,
            'jenis_nilai' => $request->jenis_nilai,
            'nilai' => $request->nilai,
            'id_th_ajaran' => $request->id_th_ajaran,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
        ]);
        $addProduk->save();

        if ($addProduk) {
            return back()->with('success', 'Nilai berhasil ditambahkan');
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function UpdateProcess(Request $request)
    {
        $process = Nilai::findOrFail($request->id)->update($request->except('_token'));
        if ($process) {
            return redirect()->back()->with("success", "Data berhasil diperbarui");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }
    public function delete($id)
    {
        $id = base64_decode($id);
        try {
            $process = Nilai::findOrFail($id)->delete();
            if ($process) {
                return redirect()->back()->with("success", "Data berhasil dihapus");
            } else {
                return redirect()->back()->withErrors("Terjadi kesalahan saat menghapus data");
            }
        } catch (\Exception $e) {
            abort(404);
        }
    }
}
