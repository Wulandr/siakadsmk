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
        $validator = Validator::make(
            $request->all(),
            [
                "name" => "required|string|max:30",
                "role" => "required",
                "email" => "required|email|unique:users,email",
                "password" => "required|min:6|confirmed"
            ],
        );
        $role = DB::table('roles')->where('id', $request->role[0])->first();
        $assignrole = $role->name;
        $input = $request->all();
        $rol = $input['role'];
        DB::beginTransaction();
        try {
            $inserting = new User;
            $inserting->name = $request->name;
            $inserting->email = $request->email;
            $inserting->role = $request->role[0];
            $inserting->multirole = implode(',', $rol);
            $inserting->email_verified_at = now();
            $inserting->password = Hash::make($request->password);
            $inserting->remember_token = Str::random(10);
            $inserting->created_at = $request->created_at;
            $inserting->updated_at = $request->updated_at;

            $inserting->save();
            $inserting->assignRole($assignrole);

            //allert
            $insertRole = new RoleAssignment();
            if ($inserting) {
                $userAs = new User();
                $idUser = $userAs->select('id')->where('name', $request->name)->first();
                $data = [];
                for ($y = 0; $y < (count($request->role)); $y++) {
                    $rolename = DB::table('roles')->where('id', $request->role[$y][0])->first();
                    $data[$y]['id_user'] = $idUser['id'];
                    $data[$y]['id_role'] = ($request->role[$y][0]);
                }
                RoleAssignment::insert($data); // Eloquent approach
                return redirect('/user')->with("success", "Data berhasil ditambahkan");
            } else {
                return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            // $request['role'] = Role::select('id', 'name')->find($request->role);
            return redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors($validator);
        } finally {
            DB::commit();
        }
        // dd(implode(',', $rol));
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
        // bismillah
        $validator = Validator::make(
            $request->all(),
            [
                "role" => "required",
            ],
            [],
            $this->attributes()
        );
        if ($validator->fails()) {
            $request['role'][0] = Role::select('id', 'name')->find($request->role);
            return redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }
        // dd($request->all());

        $role = DB::table('roles')->where('id', $request->role[0])->first();
        $assignrole = $role->name;
        DB::beginTransaction();
        // dd($assignrole);

        try {
            $user->name = $request->name;
            $user->email = $request->email;

            $input = $request->all();
            $hobby = $input['role'];
            // $input['hobby'] = implode(',', $hobby);

            $user->multirole = implode(',', $hobby);
            if (empty($request->password)) {
            }
            if (!empty($request->password)) {
                $user->password = Hash::make($request->password);
            }
            $user->role = $request->role[0];
            // $user->image   = $nama_file;
            $user->syncRoles($assignrole);
            $user->save();


            if ($user) {

                $userAs = new User();
                $idUser = $userAs->select('id')->where('name', $request->name)->first();

                RoleAssignment::where('id_user', $user->id)->delete();

                $data = [];
                for ($y = 0; $y < (count($request->role)); $y++) {
                    $rolename = DB::table('roles')->where('id', $request->role[$y][0])->first();
                    $data[$y]['id_user'] = $idUser['id'];
                    $data[$y]['id_role'] = $request->role[$y][0];
                }
                RoleAssignment::insert($data); // Eloquent approach
                // return redirect('/user')->with("success", "Data berhasil diupdate");
                return redirect()->back();
            } else {
                return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            // $request['role'][0] = Role::select('id', 'name')->find($request->role[0]);
            return redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors($validator);
        } finally {
            DB::commit();
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
