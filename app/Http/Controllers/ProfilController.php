<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\RoleAssignment;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function profil()
    {
        $rolenm = DB::table('roles')->where('id', Auth()->user()->role)->first();
        $assignrole = $rolenm->name;
        if (Auth()->user()->is_aktif == 1) {
            $user = User::all()->where('id', Auth()->user()->id)->first()->syncRoles($assignrole);
        }
        if (Auth()->user()->is_aktif != 1) {
            $user = User::all()->where('id', Auth()->user()->id)->first()->syncRoles('unverif');
        }
        $role = Role::all();
        $namaroles = Role::all();
        $tabelRole =  Role::all();
        $roleAssignment = RoleAssignment::all();
        $roleAs = DB::table('role_assignment')->get();

        // apakah profil sudah lengkap
        $lengkapRoleAs = RoleAssignment::all()->where('id_user', Auth::user()->id)->first();

        return view(
            "pengaturan.user.profile",
            [
                'role' => $role,
                'namaroles' => $namaroles,
                'tabelRole' => $tabelRole,
                'roleAssignment' => $roleAssignment,
                'roleAs' => $roleAs,
            ],
        );
    }

    public function CreateMitra()
    {
        $rolenm = DB::table('roles')->where('id', Auth()->user()->role)->first();
        $assignrole = $rolenm->name;
        if (Auth()->user()->is_aktif == 1) {
            $user = User::all()->where('id', Auth()->user()->id)->first()->syncRoles($assignrole);
        }
        if (Auth()->user()->is_aktif != 1) {
            $user = User::all()->where('id', Auth()->user()->id)->first()->syncRoles('unverif');
        }
        $role = Role::all();
        $namaroles = Role::all();
        $tabelRole =  Role::all();
        $roleAssignment = RoleAssignment::all();
        $roleAs = DB::table('role_assignment')->get();
        return view(
            "pengaturan.user.profile_create_mitra",
            [
                'role' => $role,
                'namaroles' => $namaroles,
                'tabelRole' => $tabelRole,
                'roleAssignment' => $roleAssignment,
                'roleAs' => $roleAs,
            ],
        );
    }


    public function editprofil(Request $request)
    {
        $request->validate([]);

        if (!empty($request->file('file'))) {
            $fileprofil = DB::table('users')->select('image')->where('id', auth()->user()->id)->get();
            File::delete('imageprofil/' . $fileprofil[0]->image);
            $file           = $request->file('file');
            //mengambil nama file
            $nama_file      = $file->getClientOriginalName();
            $file->move('imageprofil', $file->getClientOriginalName());
        } else {
            $nama_file = Auth::user()->image;
        }

        // $process =  DB::table('users')->where('id', $request->id)->update($request->except('_token', 'password'));

        $idRoleMitra = Role::all()->where('name', 'Mitra')->first();

        //unverif, tp dia bukan mitra
        if (Auth::user()->getroleNames()[0] == "Unverif" && Auth::user()->role != $idRoleMitra->id) {
            $process = User::where('id', Auth()->user()->id)->update([
                'name'  => $request->name,
                'email'  => $request->email,
                'image'  => $nama_file,
            ]);
        }

        //unverif
        if (Auth::user()->getroleNames()[0] != "Unverif") {
            $process = User::where('id', Auth()->user()->id)->update([
                'name'  => $request->name,
                'email'  => $request->email,
                'image'  => $nama_file,
            ]);
        }

        if ($process) {
            return redirect()->back()->with("success", "Data berhasil diperbarui");
        } else {
            return $request->all();
            // return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
        // return $fileprofil[0]->image;
    }
    public function editpassword(Request $request, User $user)
    {
        //Change Password
        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with("success", "Password successfully changed!");
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function ganti(Request $request) //beralih ke role lain
    {
        DB::table('users')->where('id', auth()->user()->id)->update(
            [
                'role' => $request->pilihrole
            ]
        );
        return redirect()->route(
            'dashboard',
        );
    }
}
