<?php

use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\GuruController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\ThAjaranController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\AbsensiController;

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RoleAssignmentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// GOOGLE AUTENTIKASI
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

// CHOOSE ROLE
Route::get('choose_role', [LoginController::class, 'chooseRole'])->name('pilih_role');

// LANDING PAGES
Route::get('/', [BerandaController::class, 'landing']);


// Un-active user page
Route::get('/tidak_aktif', function () {
    return view('dashboards.users.layouts.tidak_aktif');
})->name('tidak_aktif');
Route::get('/logout', function () {
    return view('welcome');
});

// -------------------------------------------------------------------------------------------------
//Login Page
Route::get('/login', function () {
    return view('auth.login');
});

Route::middleware(['middleware' => 'PreventBackHistory'])->group(function () {
    Auth::routes();
});

Route::group(['prefix' => 'admin', 'middleware' => ['IsAdmin', 'auth', 'PreventBackHistory']], function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::group(['middleware' => 'auth'], function () {
    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // CHANGE ROLE
    Route::post('/pergantian', [ProfilController::class, 'ganti']);

    // ROLES
    Route::get('/getall', [RoleController::class, 'getIndex'])->name('getall');
    Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('roles/{role}', [RoleController::class, 'show'])->name('roles.show');
    Route::get('roles_create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('roles_store', [RoleController::class, 'store'])->name('roles.store');
    Route::get('roles_edit/{role}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('roles_update/{role}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('roles_destroy/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');

    // USER
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/isaktif', [UserController::class, 'isAktif']);
    Route::get('/user/create', [UserController::class, 'add']);
    Route::post('/user/create', [UserController::class, 'processAdd']);
    Route::get('/user/update/{user}', [UserController::class, 'update'])->name('user.update');
    Route::post('/user/update/{user}', [UserController::class, 'processUpdate'])->name('user.processUpdate');
    Route::get('/user/delete/{user}', [UserController::class, 'delete'])->name('user.delete');
    Route::get('roles/detail/{user}', [UserController::class, 'show'])->name('user.detail');

    // PROFIL
    Route::get('/profil', [ProfilController::class, 'profil']);
    Route::post('/profil/update/{id}', [ProfilController::class, 'editprofil'])->name('profil.update');
    Route::post('/profil/changepassword/{id}', [ProfilController::class, 'editpassword'])->name('profil.changepassword');
    Route::get('/profile/createmitra', [ProfilController::class, 'CreateMitra'])->name('profil_create_mitra');
    Route::post('/profile/createmitra', [ProfilController::class, 'ProcessCreateMitra']);
    Route::post('/profile/editmitra/{id}', [ProfilController::class, 'ProcessEditMitra']);
    // ---MENU UTAMA--- //

    //role_Assignment
    Route::post('/role_ass/create', [RoleAssignmentController::class, 'store']);
    Route::post('/role_assignment/update/{user}', [RoleAssignmentController::class, 'processUpdate']);
    Route::get('/role_assignment/delete/{user}', [RoleAssignmentController::class, 'delete']);

    //Guru
    Route::get('/guru', [GuruController::class, 'index']);
    Route::get('/guru/addNew', [GuruController::class, 'AddNew']);
    Route::post('/guru/addNew/create', [GuruController::class, 'create']);
    Route::get('/guru/edit/{id}', [GuruController::class, 'Edit']);
    Route::post('/guru/edit/process/{id}', [GuruController::class, 'UpdateProcess']);
    Route::get('/guru/delete/{id}', [GuruController::class, 'delete']);

    //Murid
    Route::get('/murid', [MuridController::class, 'index']);
    Route::get('/murid/addNew', [MuridController::class, 'AddNew']);
    Route::post('/murid/addNew/create', [MuridController::class, 'create']);
    Route::get('/murid/edit/{id}', [MuridController::class, 'Edit']);
    Route::post('/murid/edit/process/{id}', [MuridController::class, 'UpdateProcess']);
    Route::get('/murid/delete/{id}', [MuridController::class, 'delete']);

    //Kelas
    Route::get('/kelas', [KelasController::class, 'index']);
    Route::get('/kelas/addNew', [KelasController::class, 'AddNew']);
    Route::post('/kelas/addNew/create', [KelasController::class, 'create']);
    Route::get('/kelas/edit/{id}', [KelasController::class, 'Edit']);
    Route::post('/kelas/edit/process/{id}', [KelasController::class, 'UpdateProcess']);
    Route::get('/kelas/delete/{id}', [KelasController::class, 'delete']);

    //Mapel
    Route::get('/mapel', [MapelController::class, 'index']);
    Route::get('/mapel/addNew', [MapelController::class, 'AddNew']);
    Route::post('/mapel/addNew/create', [MapelController::class, 'create']);
    Route::get('/mapel/edit/{id}', [MapelController::class, 'Edit']);
    Route::post('/mapel/edit/process/{id}', [MapelController::class, 'UpdateProcess']);
    Route::get('/mapel/delete/{id}', [MapelController::class, 'delete']);

    //tahun ajaran
    Route::get('/thajaran', [ThAjaranController::class, 'index']);
    Route::get('/thajaran/addNew', [ThAjaranController::class, 'AddNew']);
    Route::post('/thajaran/addNew/create', [ThAjaranController::class, 'create']);
    Route::get('/thajaran/edit/{id}', [ThAjaranController::class, 'Edit']);
    Route::post('/thajaran/edit/process/{id}', [ThAjaranController::class, 'UpdateProcess']);
    Route::get('/thajaran/delete/{id}', [ThAjaranController::class, 'delete']);

    //jadwal
    Route::get('/jadwal', [JadwalController::class, 'index']);
    Route::get('/jadwal/addNew', [JadwalController::class, 'AddNew']);
    Route::post('/jadwal/addNew/create', [JadwalController::class, 'create']);
    Route::get('/jadwal/edit/{id}', [JadwalController::class, 'Edit']);
    Route::post('/jadwal/edit/process/{id}', [JadwalController::class, 'UpdateProcess']);
    Route::get('/jadwal/delete/{id}', [JadwalController::class, 'delete']);

    //nilai
    Route::get('/nilai', [NilaiController::class, 'index']);
    Route::get('/nilai/addNew', [NilaiController::class, 'AddNew']);
    Route::post('/nilai/addNew/create', [NilaiController::class, 'create']);
    Route::get('/nilai/edit/{id}', [NilaiController::class, 'Edit']);
    Route::post('/nilai/edit/process/{id}', [NilaiController::class, 'UpdateProcess']);
    Route::get('/nilai/delete/{id}', [NilaiController::class, 'delete']);


    //absensi
    Route::get('/absensi', [AbsensiController::class, 'index']);
    Route::get('/absensi/addNew', [AbsensiController::class, 'AddNew']);
    Route::post('/absensi/addNew/create', [AbsensiController::class, 'create']);
    Route::get('/absensi/edit/{id}', [AbsensiController::class, 'Edit']);
    Route::post('/absensi/edit/process/{id}', [AbsensiController::class, 'UpdateProcess']);
    Route::get('/absensi/delete/{id}', [AbsensiController::class, 'delete']);

    // BERANDA
    Route::get('/beranda', [BerandaController::class, 'index']);
    Route::post('/beranda/edit/beranda', [BerandaController::class, 'process_beranda']);
    Route::post('/beranda/edit/kegiatan', [BerandaController::class, 'process_kegiatan']);
    Route::post('/beranda/edit/mitra', [BerandaController::class, 'process_mitra']);
    Route::post('/beranda/edit/berita', [BerandaController::class, 'process_berita']);
});
