<?php

namespace App\Http\Controllers;

use App\Models\ThAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\User as Usernya;
use App\Models\RoleAssignment;
use Illuminate\Support\Facades\Auth;
use illuminate\Support\Str;

class ThAjaranController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:thajaran_show', ['only' => 'index']);
        $this->middleware('permission:thajaran_create', ['only' => 'create']);
        $this->middleware('permission:thajaran_delete', ['only' => 'delete']);
        $this->middleware('permission:thajaran_update', ['only' => 'update']);
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
        $thajaran = ThAjaran::all();

        return view('dashboard.thajaran.index', compact(
            'users',
            'role',
            'tabelRole',
            'roleAssignment',
            'thajaran',
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
        $thajaran = ThAjaran::all();

        return view('dashboard.thajaran.create', compact(
            'users',
            'role',
            'tabelRole',
            'roleAssignment',
            'thajaran',
        ));
    }

    public function create(Request $request)
    {
        // save the input to database
        $addProduk = ThAjaran::create([
            'kode' => $request->kode,
            'th_ajaran' => $request->th_ajaran,
            'semester' => $request->semester,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
        ]);
        $addProduk->save();

        if ($addProduk) {
            return redirect('/thajaran')->with("success", "Data berhasil ditambahkan");
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
        $thajaran = ThAjaran::findOrFail($id);

        return view('dashboard.thajaran.edit', compact(
            'id',
            'users',
            'role',
            'tabelRole',
            'roleAssignment',
            'thajaran',
        ));
    }

    public function UpdateProcess(Request $request, $id)
    {
        $id = base64_decode($id);
        $process = ThAjaran::findOrFail($id)->update($request->except('_token'));
        if ($process) {
            return redirect('/thajaran')->with("success", "Data berhasil diperbarui");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }
    public function delete($id)
    {
        $id = base64_decode($id);
        try {
            $process = ThAjaran::findOrFail($id)->delete();
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
