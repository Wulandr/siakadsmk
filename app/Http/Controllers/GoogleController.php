<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\DB;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            // mengambil id google
            $user = Socialite::driver('google')->stateless()->user();
            $findemail = User::where('email', $user->email)->first();
            // 
            // jika email user sama dengan di database maka langsung redirect ke halaman selanjutnya
            $cekAdaEmail = DB::table('users')->where('email', $user->email)->first();
            $cekAktif =  DB::table('users')
                ->where('email', $user->email)
                ->first();
            // dd($cekAktif->is_aktif);

            if ($findemail) {
                Auth::login($findemail);
                if (!empty($cekAdaEmail) == 'true' && $cekAktif->is_aktif == 1) { //akun sudah diaktifkan admin
                    return redirect('/dashboard');
                } elseif (!empty($cekAdaEmail) == 'true' && $cekAktif->is_aktif == 0) { //akun belum diaktifkan
                    // Auth::logout();
                    // return redirect('/tidak_aktif');

                    $rolenm = DB::table('roles')->where('id', Auth()->user()->role)->first();
                    $assignrole = $rolenm->name;
                    if (Auth()->user()->is_aktif == 1) {
                        $user = User::all()->where('id', Auth()->user()->id)->first()->syncRoles($assignrole);
                    }
                    if (Auth()->user()->is_aktif != 1) {
                        $user = User::all()->where('id', Auth()->user()->id)->first()->syncRoles('unverif');
                    }
                    return redirect('/profil');
                }
            } else { // email tidak cocok dengan database
                dd($cekAktif);
            }
            // dd($cekAktif);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
