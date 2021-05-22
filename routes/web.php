<?php

use App\Http\Controllers\HomeController;
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
    Route::get('/cetak/{siswa}', [SiswaController::class,'cetak'])->name('siswa.cetak');
});

Route::resource('siswa', SiswaController::class);

//Route::get('mahasiswa/cetak_pdf/{nim}', [MahasiswaController::class, 'cetak_pdf'])->name('mahasiswa.cetak_pdf');

Route::prefix('admin')->group(function () {
    Route::get('/data-siswa', [HomeController::class,'datasiswa'])->name('admin.datasiswa');
    Route::get('/data-ortu', [HomeController::class,'dataortu'])->name('admin.dataortu');
    Route::get('/biaya-daftar', [HomeController::class,'biayadaftar'])->name('admin.biayadaftar');
    Route::get('/daftar-ulang', [HomeController::class,'daftarulang'])->name('admin.daftarulang');
    Route::get('/cetak', [HomeController::class,'cetak'])->name('cetak');
});