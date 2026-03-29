<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Murid;
use App\Models\Kelas;
use App\Models\ThAjaran;
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

class MuridController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:murid_show', ['only' => 'index']);
        $this->middleware('permission:murid_create', ['only' => 'create']);
        $this->middleware('permission:murid_delete', ['only' => 'delete']);
        $this->middleware('permission:murid_update', ['only' => 'update']);
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
        $murid = Murid::all();

        return view('dashboard.murid.index', compact(
            'users',
            'role',
            'tabelRole',
            'roleAssignment',
            'murid',
        ));
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
        $murid = Murid::all();
        $kelas = Kelas::all();
        $tahunAjaran = ThAjaran::all();

        return view('dashboard.murid.create', compact(
            'users',
            'role',
            'tabelRole',
            'roleAssignment',
            'murid',
            'kelas',
            'tahunAjaran'
        ));
    }

    public function create(Request $request)
    {
        // save the input to database
        $addProduk = Murid::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'id_kelas' => $request->id_kelas,
            'id_th_ajaran' => $request->id_th_ajaran,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
        ]);
        $addProduk->save();

        if ($addProduk) {
            return redirect('/murid')->with("success", "Data berhasil ditambahkan");
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
        $murid = Murid::findOrFail($id);
        $kelas = Kelas::all();
        $guru = Guru::all();
        $thAjaran = ThAjaran::all();

        return view('dashboard.murid.edit', compact(
            'id',
            'users',
            'role',
            'tabelRole',
            'roleAssignment',
            'murid',
            'kelas',
            'thAjaran',
            'guru'

        ));
    }

    public function UpdateProcess(Request $request, $id)
    {
        $id = base64_decode($id);
        $process = Murid::findOrFail($id)->update($request->except('_token'));
        if ($process) {
            return redirect('/murid')->with("success", "Data berhasil diperbarui");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }
    public function delete($id)
    {
        $id = base64_decode($id);
        try {
            $process = Murid::findOrFail($id)->delete();
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
