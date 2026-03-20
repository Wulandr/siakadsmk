<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Models\Komentar;
use App\Models\Message;
use App\Models\User;
use App\Models\Unit;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Mitra as ModelsMitra;
use App\Models\RoleAssignment;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('permission:chat_show', ['only' => 'index']);
    }
    public function index()
    {
        $rolenm = DB::table('roles')->where('id', Auth()->user()->role)->first();
        $assignrole = $rolenm->name;
        $unit = Unit::all();
        $role = Role::all();
        $namaroles = Role::all();
        $tabelRole =  Role::all();
        $roleAssignment = RoleAssignment::all();
        $roleAs = DB::table('role_assignment')->get();
        $mitra = ModelsMitra::all();
        $users = User::where('id', '!=', Auth::user()->id)->get();
        $tbMessage = Message::where('to_user', '=', Auth::user()->id)->get();
        return view(
            "dashboard.chat.index",
            [
                'unit' => $unit, 'role' => $role, 'namaroles' => $namaroles, 'tabelRole' => $tabelRole,
                'roleAssignment' => $roleAssignment, 'mitra' => $mitra, 'roleAs' => $roleAs, 'users' => $users,
                'tbMessages' => $tbMessage
            ],
        );
    }
    public function isRead(Request $request)
    {
        $chat = Message::where('from_user', '=', $request->fromUser)
            ->update(['is_read' => '1']);

        if ($chat) {
            return response()->json(['success' => 'Status change successfully.']);
        }
    }
}
