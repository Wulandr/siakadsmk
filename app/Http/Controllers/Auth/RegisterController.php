<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User as Usernya;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = RouteServiceProvider::PROFIL;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // Usernya::all()->where('name', $data['name'])->first()->assignRole('Prodi');
        $roleUser = Role::select('id')->where('name', $data['role'])->first();
        $inserting = Usernya::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'is_aktif' => 0,
            'role' => $roleUser->id,
            'multirole' => $roleUser->id,
            'password' => Hash::make($data['password']),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ]);
        $inserting->assignRole('unverif');
        // return $roleUser;
        return $inserting;
    }
}
