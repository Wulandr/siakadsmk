<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\mapel;
use App\Models\ThAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\User as Usernya;
use App\Models\RoleAssignment;
use Illuminate\Support\Facades\Auth;
use Excel;
use illuminate\Support\Str;

class MapelController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:mapel_show', ['only' => 'index']);
        $this->middleware('permission:mapel_create', ['only' => 'create']);
        $this->middleware('permission:mapel_delete', ['only' => 'delete']);
        $this->middleware('permission:mapel_update', ['only' => 'update']);
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
        $mapel = Mapel::all();

        return view('dashboard.mapel.index', compact(
            'users',
            'role',
            'tabelRole',
            'roleAssignment',
            'mapel',
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
        $mapel = mapel::all();

        return view('dashboard.mapel.create', compact(
            'users',
            'role',
            'tabelRole',
            'roleAssignment',
            'mapel',
        ));
    }

    public function create(Request $request)
    {
        // save the input to database
        $addProduk = mapel::create([
            'mapel' => $request->mapel,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
        ]);
        $addProduk->save();

        if ($addProduk) {
            return redirect('/mapel')->with("success", "Data berhasil ditambahkan");
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
        $mapel = mapel::findOrFail($id);

        return view('dashboard.mapel.edit', compact(
            'id',
            'users',
            'role',
            'tabelRole',
            'roleAssignment',
            'mapel',
        ));
    }

    public function UpdateProcess(Request $request, $id)
    {
        $id = base64_decode($id);
        $process = mapel::findOrFail($id)->update($request->except('_token'));
        if ($process) {
            return redirect('/mapel')->with("success", "Data berhasil diperbarui");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }
    public function delete($id)
    {
        $id = base64_decode($id);
        try {
            $process = mapel::findOrFail($id)->delete();
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
