<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\JnspelangController;
use App\Http\Controllers\WkController;
use App\Http\Controllers\GbController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\CobaController;

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

Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);

    Route::resource('unit', UnitController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('jnspelang', JnspelangController::class);
    Route::resource('wk', WkController::class);
    Route::resource('gb', GbController::class);
    Route::resource('siswa', SiswaController::class);

    Route::get('getKelas', [CobaController::class, 'getKelas'])->name('getKelas');
    Route::resource('coba', CobaController::class);
});
