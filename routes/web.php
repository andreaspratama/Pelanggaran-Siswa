<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SubkelasController;
use App\Http\Controllers\JnspelangController;
use App\Http\Controllers\WkController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\GbController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\DatadiriController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\ThnakademikController;

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
    return view('auth.login');
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/utama', function () {
        return view('pages.admin.utama');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::group(['middleware' => ['auth', 'checkRole:admin']], function(){
    Route::prefix('admin')->group(function () {
    
        Route::resource('unit', UnitController::class);
        Route::resource('kelas', KelasController::class);
        Route::resource('subkelas', SubkelasController::class);
        Route::resource('jnspelang', JnspelangController::class);
        Route::resource('wk', WkController::class);
        Route::post('gurubk/import', [GbController::class, 'importExcelGuruBk'])->name('importExcelGuruBk');
        Route::resource('gb', GbController::class);
        Route::post('guru/import', [GuruController::class, 'importExcelGuru'])->name('importExcelGuru');
        Route::resource('guru', GuruController::class);
        Route::resource('thnakademik', ThnakademikController::class);
        Route::post('user/import', [UserController::class, 'importExcelUser'])->name('importExcelUser');
        Route::resource('user', UserController::class);
    
        Route::get('getSubkelas', [SiswaController::class, 'getSubkelas'])->name('getSubkelas');
        Route::get('getKelasUpdate', [SiswaController::class, 'getKelasUpdate'])->name('getKelasUpdate');
        Route::get('getSubkelas', [SiswaController::class, 'getSubkelas'])->name('getSubkelas');
        Route::get('getKelas', [SiswaController::class, 'getKelas'])->name('getKelas');
        Route::post('siswa/import', [SiswaController::class, 'importExcelSiswa'])->name('importExcelSiswa');
        Route::get('siswa/{id}/pelanggaran', [SiswaController::class, 'point'])->name('ambilPelanggaran');
        Route::resource('siswa', SiswaController::class);

        Route::get('kel/tambah', [KeluargaController::class, 'create'])->name('kelCreate');
        Route::get('kel', [KeluargaController::class, 'index'])->name('kelIndex');

        Route::get('datadiri/{id}/detail', [DatadiriController::class, 'show'])->name('datadiriShow');
        Route::post('datadiri/tambah/proses', [DatadiriController::class, 'store'])->name('datadiriStore');
        Route::get('datadiri/tambah', [DatadiriController::class, 'create'])->name('datadiriCreate');
        Route::get('datadiri', [DatadiriController::class, 'index'])->name('datadiriIndex');
    
        // Route::get('cobaliat', [CobaController::class, 'liat'])->name('cobaliat');
        // Route::resource('coba', CobaController::class);
    });
});

Route::group(['middleware' => ['auth', 'checkRole:siswa']], function(){
    Route::get('/siswa', function () {
        return 'Ini halaman siswa';
    })->name('dashboardSiswa');
});

// Route::group(['middleware' => ['auth', 'checkRole:guru']], function(){
//     Route::get('/guru', function () {
//         return 'Ini halaman guru';
//     })->name('dashboardGuru');

//     Route::get('getSiswaPelang', [PelanggaranController::class, 'getSiswaPelang'])->name('getSiswaPelang');
//     Route::get('getSubKelasPelang', [PelanggaranController::class, 'getSubKelasPelang'])->name('getSubKelasPelang');
//     Route::get('pelanggaranExportPdf', [PelanggaranController::class, 'exportPdf'])->name('pelanggaranExportPdf');
//     Route::get('pelanggaranExportExcel', [PelanggaranController::class, 'exportExcel'])->name('pelanggaranExportExcel');

//     // Cetak pdf per id
//     Route::get('cetakPdfSiswaId/{id}', [PelanggaranController::class, 'cetakPdfSiswaId'])->name('cetakPdfSiswaId');

//     // Cetak excel per id
//     Route::get('pelanggaranExportExcelId/{id}', [PelanggaranController::class, 'exportExcelId'])->name('pelanggaranExportExcelId');

//     Route::get('getSiswaPelangSortir', [PelanggaranController::class, 'getSiswaPelangSortir'])->name('getSiswaPelangSortir');
//     Route::get('getSubKelasPelangSortir', [PelanggaranController::class, 'getSubKelasPelangSortir'])->name('getSubKelasPelangSortir');
//     Route::get('pelanggaranProses/{siswa}', [PelanggaranController::class, 'proses'])->name('pelanggaranProses');
//     Route::get('pelanggaranSortir', [PelanggaranController::class, 'pelanggaranSortir'])->name('pelanggaranSortir');
//     Route::resource('pelanggaran', PelanggaranController::class);
// });

Route::group(['middleware' => ['auth', 'checkRole:gurubk,guru']], function(){
    Route::get('/guruBk', function () {
        return 'Ini halaman guru bk';
    })->name('dashboardGuruBk');

    Route::get('getSiswaPelang', [PelanggaranController::class, 'getSiswaPelang'])->name('getSiswaPelang');
    Route::get('getSubKelasPelang', [PelanggaranController::class, 'getSubKelasPelang'])->name('getSubKelasPelang');
    Route::get('pelanggaranExportPdf', [PelanggaranController::class, 'exportPdf'])->name('pelanggaranExportPdf');
    Route::get('pelanggaranExportExcel', [PelanggaranController::class, 'exportExcel'])->name('pelanggaranExportExcel');

    // Cetak pdf per id
    Route::get('cetakPdfSiswaId/{id}', [PelanggaranController::class, 'cetakPdfSiswaId'])->name('cetakPdfSiswaId');

    // Cetak excel per id
    Route::get('pelanggaranExportExcelId/{id}', [PelanggaranController::class, 'exportExcelId'])->name('pelanggaranExportExcelId');

    Route::get('getSiswaPelangSortir', [PelanggaranController::class, 'getSiswaPelangSortir'])->name('getSiswaPelangSortir');
    Route::get('getSubKelasPelangSortir', [PelanggaranController::class, 'getSubKelasPelangSortir'])->name('getSubKelasPelangSortir');
    Route::get('pelanggaranProses/{siswa}', [PelanggaranController::class, 'proses'])->name('pelanggaranProses');
    Route::get('pelanggaranSortir', [PelanggaranController::class, 'pelanggaranSortir'])->name('pelanggaranSortir');
    Route::resource('pelanggaran', PelanggaranController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
