<?php

namespace App\Http\Controllers;

use App\Models\Guru;
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

class GuruController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:guru_show', ['only' => 'index']);
        $this->middleware('permission:guru_create', ['only' => 'create']);
        $this->middleware('permission:guru_delete', ['only' => 'delete']);
        $this->middleware('permission:guru_update', ['only' => 'update']);
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
        $guru = Guru::all();

        return view('dashboard.guru.index', compact(
            'users',
            'role',
            'tabelRole',
            'roleAssignment',
            'guru',
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
        $guru = Guru::all();

        return view('dashboard.guru.create', compact(
            'users',
            'role',
            'tabelRole',
            'roleAssignment',
            'guru'
        ));
    }

    public function create(Request $request)
    {
        // save the input to database
        $addProduk = Guru::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
        ]);
        $addProduk->save();

        if ($addProduk) {
            return redirect('/guru')->with("success", "Data berhasil ditambahkan");
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
        $guru =  DB::table('guru')->where('id', $id)->get();

        return view('dashboard.guru.edit', compact(
            'id',
            'users',
            'role',
            'tabelRole',
            'roleAssignment',
            'guru'

        ));
    }

    public function UpdateProcess(Request $request, $id)
    {
        $id = base64_decode($id);
        $process = Guru::findOrFail($id)->update($request->except('_token'));
        if ($process) {
            return redirect('/guru')->with("success", "Data berhasil diperbarui");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }
    public function delete($id)
    {
        $id = base64_decode($id);
        try {
            $process = Guru::findOrFail($id)->delete();
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
