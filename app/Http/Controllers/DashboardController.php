<?php

namespace App\Http\Controllers;

use App\Models\RoleAssignment;
use App\Models\User as Usernya;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $rolenm = DB::table('roles')->where('id', Auth()->user()->role)->first();
        $assignrole = $rolenm->name;
        if (Auth()->user()->is_aktif == 1) {
            $user = Usernya::all()->where('id', Auth()->user()->id)->first()->syncRoles($assignrole);
        }
        if (Auth()->user()->is_aktif != 1) {
            $user = Usernya::all()->where('id', Auth()->user()->id)->first()->syncRoles('unverif');
        }
        $users = DB::table('users')->get();
        $role = DB::table('roles')->get();
        $tabelRole =  Role::all();
        $roleAssignment = RoleAssignment::all();

        //total user
        $total_user = count($users);
        $total_role = count($role);

        return view(
            "dashboard.index",
            compact(
                'users',
                'role',
                'tabelRole',
                'roleAssignment',
                'total_user',
                'total_role',
            )
        );
    }
}
