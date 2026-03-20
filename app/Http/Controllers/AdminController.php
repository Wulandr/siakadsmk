<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as Usernya;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    //
    function index()
    {
        $role = DB::table('roles')->where('id', Auth()->user()->role)->first();
        $assignrole = $role->name;
        $user = Usernya::all()->where('id', Auth()->user()->id)->first()->syncRoles($assignrole);

        $tabelRole =  Role::all();

        $userrole = Usernya::join();
        return view('dashboards.users.index', ['userrole' => $userrole, 'tabelRole' => $tabelRole]);
    }
}
