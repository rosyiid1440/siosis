<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {
    Auth::routes();
});

Route::get('/login', [App\Http\Controllers\UserAuthController::class, 'index']);
Route::post('/login', [App\Http\Controllers\UserAuthController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\UserAuthController::class, 'logout']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/periode', [App\Http\Controllers\PeriodeController::class, 'index']);
Route::get('/periode/add', [App\Http\Controllers\PeriodeController::class, 'create']);
Route::get('/periode/{id}', [App\Http\Controllers\PeriodeController::class, 'edit']);
Route::patch('/periode/{id}', [App\Http\Controllers\PeriodeController::class, 'update']);
Route::post('/periode', [App\Http\Controllers\PeriodeController::class, 'store']);
Route::delete('/periode/{id}', [App\Http\Controllers\PeriodeController::class, 'destroy']);

// Route::get('/angkatan', [App\Http\Controllers\AngkatanController::class, 'index']);
// Route::get('/angkatan/add', [App\Http\Controllers\AngkatanController::class, 'create']);
// Route::get('/angkatan/{id}', [App\Http\Controllers\AngkatanController::class, 'edit']);
// Route::patch('/angkatan/{id}', [App\Http\Controllers\AngkatanController::class, 'update']);
// Route::post('/angkatan', [App\Http\Controllers\AngkatanController::class, 'store']);
// Route::delete('/angkatan/{id}', [App\Http\Controllers\AngkatanController::class, 'destroy']);

Route::get('/user', [App\Http\Controllers\UserController::class, 'index']);
Route::get('/user/add', [App\Http\Controllers\UserController::class, 'create']);
Route::get('/user/{id}', [App\Http\Controllers\UserController::class, 'edit']);
Route::patch('/user/{id}', [App\Http\Controllers\UserController::class, 'update']);
Route::post('/user', [App\Http\Controllers\UserController::class, 'store']);
Route::delete('/user/{id}', [App\Http\Controllers\UserController::class, 'destroy']);

Route::get('/kandidat', [App\Http\Controllers\KandidatController::class, 'index']);
Route::get('/kandidat/{nama_periode}/add', [App\Http\Controllers\KandidatController::class, 'create']);
Route::get('/kandidat/{nama_periode}', [App\Http\Controllers\KandidatController::class, 'show']);
Route::get('/kandidat/edit/{id}', [App\Http\Controllers\KandidatController::class, 'edit']);
Route::patch('/kandidat/{id}', [App\Http\Controllers\KandidatController::class, 'update']);
Route::post('/kandidat', [App\Http\Controllers\KandidatController::class, 'store']);
Route::delete('/kandidat/{id}', [App\Http\Controllers\KandidatController::class, 'destroy']);

Route::get('/voting', [App\Http\Controllers\VotingController::class, 'index']);
Route::post('/voting', [App\Http\Controllers\VotingController::class, 'store']);