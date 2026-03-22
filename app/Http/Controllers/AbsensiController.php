<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\kelas;
use App\Models\ThAjaran;
use App\Models\Absensi;
use App\Models\Murid;
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

class AbsensiController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:absensi_show', ['only' => 'index']);
        $this->middleware('permission:absensi_create', ['only' => 'create']);
        $this->middleware('permission:absensi_delete', ['only' => 'delete']);
        $this->middleware('permission:absensi_update', ['only' => 'update']);
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
        $absensi = Absensi::all();
        $thAjaran = ThAjaran::all();

        return view('dashboard.absensi.index', compact(
            'users',
            'role',
            'tabelRole',
            'roleAssignment',
            'absensi',
            'thAjaran'
        ));
    }

    public function filter(Request $request)
    {
        $query = Absensi::with(['murid', 'thAjaran']);

        if ($request->id_th_ajaran) {
            $query->where('id_th_ajaran', $request->id_th_ajaran);
        }

        return response()->json([
            'data' => $query->get()
        ]);
    }

    public function addNew()
    {
        $rolenm = DB::table('roles')->where('id', Auth()->user()->role)->first();
        $assignrole = $rolenm->name;
        $user = Usernya::all()->where('id', Auth()->user()->id)->first()->syncRoles($assignrole);
        $users = DB::table('users')->get();
        $role = DB::table('roles')->get();
        $tabelRole =  Role::all();
        $roleAssignment = RoleAssignment::all();
        $kelas = Kelas::all();
        $absensi = Absensi::all();
        $murid = Murid::all();
        $thAjaran = ThAjaran::all();

        return view('dashboard.absensi.create', compact(
            'users',
            'role',
            'tabelRole',
            'roleAssignment',
            'kelas',
            'absensi',
            'murid',
            'thAjaran'
        ));
    }

    public function create(Request $request)
    {
        // save the input to database
        $addProduk = Absensi::create([
            'id_murid' => $request->id_murid,
            'id_th_ajaran' => $request->id_th_ajaran,
            'tanggal' => $request->tanggal,
            'jenis' => $request->jenis,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
        ]);
        $addProduk->save();

        if ($addProduk) {
            return redirect('/absensi')->with("success", "Data berhasil ditambahkan");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function Edit($id)
    {
        $id = base64_decode($id);
        $rolenm = DB::table('roles')->where('id', Auth()->user()->role)->first();
        $assignrole = $rolenm->name;
        $user = Usernya::all()->where('id', Auth()->user()->id)->first()->syncRoles($assignrole);
        $users = DB::table('users')->get();
        $role = DB::table('roles')->get();
        $tabelRole =  Role::all();
        $roleAssignment = RoleAssignment::all();
        $absensi = Absensi::findOrFail($id);
        $murid =  Murid::all();
        $thAjaran = ThAjaran::all();

        return view('dashboard.absensi.edit', compact(
            'id',
            'users',
            'role',
            'tabelRole',
            'roleAssignment',
            'absensi',
            'murid',
            'thAjaran'
        ));
    }

    public function UpdateProcess(Request $request, $id)
    {
        $id = base64_decode($id);
        $process = Absensi::findOrFail($id)->update($request->except('_token'));
        if ($process) {
            return redirect('/absensi')->with("success", "Data berhasil diperbarui");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }
    public function delete($id)
    {
        $id = base64_decode($id);
        try {
            $process = Absensi::findOrFail($id)->delete();
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
