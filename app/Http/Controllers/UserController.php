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
use Illuminate\Support\Facades\Crypt;
use App\Models\RoleAssignment;

class UserController extends Controller
{
    protected $table = 'user';
    public function __construct()
    {
        $this->middleware('permission:user_create', ['only' => 'add']);
        $this->middleware('permission:user_delete', ['only' => 'delete']);
        $this->middleware('permission:user_detail', ['only' => 'show']);
        $this->middleware('permission:user_show', ['only' => 'index']);
        $this->middleware('permission:user_update', ['only' => 'update']);
    }
    public function index()
    {
        $user = User::all();
        $role = Role::all();
        $users = new User();
        $userrole = $users->join();
        $tabelRole =  Role::all();
        $roleAssignment = RoleAssignment::all();
        return view("pengaturan.user.user_index")->with([
            'user' => $user,
            'userrole' => $userrole,
            'role' => $role,
            'tabelRole' => $tabelRole,
            'roleAssignment' => $roleAssignment

        ]);
        // return Auth::user()->getroleNames();
        // return Auth::user()->getAllPermissions();
    }

    public function add()
    {
        $role = Role::all();
        $users = new User();
        $userrole = $users->join();
        $tabelRole =  Role::all();
        $tabelRole =  Role::all();
        $roleAssignment = RoleAssignment::all();

        return view("pengaturan.user.user_create")->with([
            'userrole' => $userrole,
            'role' => $role,
            'tabelRole' => $tabelRole,
            'roleAssignment' => $roleAssignment,
        ]);
    }

    public function processAdd(Request $request)
    {
        // ambil role (tanpa array)
        $role = DB::table('roles')->where('id', $request->role)->first();
        $assignrole = $role->name;

        // insert user
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->multirole = $request->role; // kalau cuma 1
        $user->email_verified_at = now();
        $user->is_aktif = 1;
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(10);
        $user->created_at = $request->created_at;
        $user->updated_at = $request->updated_at;

        $user->save();

        // spatie role
        $user->assignRole($assignrole);

        // insert role_assignment
        RoleAssignment::create([
            'id_user' => $user->id,
            'id_role' => $request->role
        ]);

        DB::commit();

        return redirect('/user')->with("success", "Data berhasil ditambahkan");
    }

    public function show($id)
    {
        $id = base64_decode($id);
        $user = new User;
        $user = User::all()->where('id', $id)->first();
        $role =  DB::table('roles')->select('name')->where('id', $user->role)->first();
        $authorities =  config('permission.authorities');
        $permissionChecked = $user->getAllPermissions()->pluck('name')->toArray();
        $tabelRole =  Role::all();
        $tabelRole =  Role::all();
        $roleAssignment = RoleAssignment::all();
        return view('pengaturan.user.user_detail', [
            'user' => $user,
            'role' => $role,
            'authorities' => $authorities,
            'permissionChecked' => $permissionChecked,
            'tabelRole' => $tabelRole,
            'roleAssignment' => $roleAssignment,
        ]);
    }

    public function update($id)
    {
        $id = base64_decode($id);
        $user = new User;
        $user = User::all()->where('id', $id)->first();
        $userrole = $user->join();
        $tabelRole =  Role::all();
        $roleAssignment = RoleAssignment::all();
        try {
            return view("pengaturan.user.user_update")->with([
                'user' => $user,
                'userrole' => $userrole,
                'roleSelected' => $user->roles->first(),
                'tabelRole' => $tabelRole,
                'roleAssignment' => $roleAssignment,
            ]);
            // return $user->getAllPermissions();
            // return ($user->role);
        } catch (\Exception $e) {
            abort(404);
        }
    }

    public function processUpdate(Request $request, User $user)
    {
        DB::beginTransaction();

        try {
            // validasi
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'role' => 'required|exists:roles,id',
            ]);

            // ambil role
            $role = DB::table('roles')->where('id', $request->role)->first();
            $assignrole = $role->name;

            // update user
            $user->name = $request->name;
            $user->email = $request->email;

            if (!empty($request->password)) {
                $user->password = Hash::make($request->password);
            }

            $user->role = $request->role;
            $user->multirole = $request->role;

            // Spatie role
            $user->syncRoles($assignrole);

            $user->save();

            // ✅ SIMPAN KE role_assignment (SINGLE)
            RoleAssignment::updateOrCreate(
                ['id_user' => $user->id],
                ['id_role' => $request->role],
            );

            DB::commit();

            return redirect('/user')->with('success', 'User berhasil diupdate');
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()
                ->back()
                ->withInput()
                ->withErrors('Terjadi kesalahan: ' . $th->getMessage());
        }
    }

    public function delete($id)
    {
        $id = base64_decode($id);
        $user = new User;
        $user = User::all()->where('id', $id)->first();
        $role = DB::table('roles')->where('id', $user->role)->first();
        $assignrole = $role->name;
        DB::beginTransaction();
        // dd($assignrole);


        try {
            $user->removeRole($assignrole);
            $user->delete();
        } catch (\Throwable $th) {
            DB::rollBack();
        } finally {
            DB::commit();
        }
        return redirect()->back()->with("success", "Data berhasil dihapus");
    }
    public function search(Request $request) {}
    public function attributes()
    {
        return
            [
                "name" => "Nama",
                "role" => "Role",
                "email" => "Email",
                "password" => "Password",
            ];
    }
    public function isAktif(Request $request)
    {
        $user = User::find($request->id);
        $idRole = User::where('id', $request->id)->first();
        $namaRole = Role::select('name')->where('id', $idRole->role)->first();
        $user->is_aktif = $request->is_aktif;
        $user->save();
        $user->assignRole($namaRole->name);

        return response()->json(['success' => 'Status change successfully.']);
    }
}
