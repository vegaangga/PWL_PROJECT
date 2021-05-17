<?php

use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Auth;
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
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');

Route::prefix('siswa')->group(function () {
    Route::get('/', [SiswaController::class,'index'])->name('siswa.index');
    Route::get('/profile', [SiswaController::class,'profile'])->name('siswa.profile');
    Route::get('/formulir', [SiswaController::class,'formulir'])->name('siswa.formulir');
    Route::get('/{siswa}/cetak', [SiswaController::class,'cetak'])->name('siswa.cetak');
});

Route::resource('siswa', SiswaController::class);