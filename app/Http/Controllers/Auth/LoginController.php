<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo()
    {
        if (Auth()->user()->role == 1) { //admin
            // return route('admin.dashboard');
            return route('home');
        } elseif (Auth()->user()->role != 1) { //selain admin
            // return route('sv.dashboard');
            return route('home');
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            // DB::table('users')->where('id', auth()->user()->id)->update(
            //     [
            //         'role' => $request->role
            //     ]
            // );
            $cekAktif =  DB::table('users')->where('email', $input['email'])->first();
            if ($cekAktif->is_aktif == 1) { //akun sudah diaktifkan admin
                return redirect('/dashboard');
            } elseif ($cekAktif->is_aktif == 0) { //akun belum diaktifkan
                $user = User::select('id')->where('email', $input['email']);
                return redirect('/profil');
            }
        } else {
            session()->flash('error', 'Alamat Email atau Password Anda salah!.');
            return redirect()->route('login');
        }
    }

    public function gantiRole(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            DB::table('users')->where('id', auth()->user()->id)->update(
                [
                    'role' => $request->pilihrole
                ]
            );

            if (auth()->user()->role == 1) {
                return redirect()->route(
                    'dashboard',
                );
            } elseif (auth()->user()->role != 1) { //selain admin
                return redirect()->route(
                    'dashboard',
                );
            }
        } else {
            session()->flash('error', 'Alamat Email atau Password Anda salah!.');
            return redirect()->route('login');
        }
    }

    // public function chooseRole()
    // {
    //     return route('pilih_role');
    // }
}
