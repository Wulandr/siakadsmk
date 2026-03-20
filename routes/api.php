<?php

use App\Http\Controllers\ApiMitra\ApiMitraController;
use App\Http\Controllers\ApiPendampingan\ApiPendampinganController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/mitra', [ApiMitraController::class, 'index']);
Route::get('/mitra/show/{id}', [ApiMitraController::class, 'show']);

Route::get('/pendampingan', [ApiPendampinganController::class, 'index']);
