<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\kelas;
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

class KelasController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:kelas_show', ['only' => 'index']);
        $this->middleware('permission:kelas_create', ['only' => 'create']);
        $this->middleware('permission:kelas_delete', ['only' => 'delete']);
        $this->middleware('permission:kelas_update', ['only' => 'update']);
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
        $kelas = kelas::all();

        return view('dashboard.kelas.index', compact(
            'users',
            'role',
            'tabelRole',
            'roleAssignment',
            'kelas',
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
        $kelas = Kelas::all();
        $walikelas = Guru::all();

        return view('dashboard.kelas.create', compact(
            'users',
            'role',
            'tabelRole',
            'roleAssignment',
            'kelas',
            'walikelas'
        ));
    }

    public function create(Request $request)
    {
        // save the input to database
        $addProduk = kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'wali_kelas' => $request->wali_kelas,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
        ]);
        $addProduk->save();

        if ($addProduk) {
            return redirect('/kelas')->with("success", "Data berhasil ditambahkan");
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
        $kelas = kelas::findOrFail($id);
        $walikelas = Guru::where('jabatan', 'Wali Kelas')->get();

        return view('dashboard.kelas.edit', compact(
            'id',
            'users',
            'role',
            'tabelRole',
            'roleAssignment',
            'kelas',
            'walikelas',
        ));
    }

    public function UpdateProcess(Request $request, $id)
    {
        $id = base64_decode($id);
        $process = kelas::findOrFail($id)->update($request->except('_token'));
        if ($process) {
            return redirect('/kelas')->with("success", "Data berhasil diperbarui");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }
    public function delete($id)
    {
        $id = base64_decode($id);
        try {
            $process = kelas::findOrFail($id)->delete();
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
