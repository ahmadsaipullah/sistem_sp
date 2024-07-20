<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\prodiController;
use App\Http\Controllers\tugasController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\mahasiswaController;
use App\Http\Controllers\perbaikanController;
use App\Http\Controllers\verifikasiController;
use App\Http\Controllers\pendaftaranController;
use App\Http\Controllers\Admin\{adminController,dashboardController,dosenController,matkulController,pengajuanController};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require __DIR__.'/auth.php';

Route::get('/error-page', [dashboardController::class,'error'])->name('error');

Route::group(['middleware' => 'auth', 'PreventBackHistory'], function () {

// dashboard
Route::get('/', [dashboardController::class, 'index'])->name('dashboard');

// profile
Route::get('/profile/{encryptedId}/edit' ,[profileController::class, 'index'])->name('profile.index');
Route::put('/profile/password-update' ,[profileController::class, 'updatePassword'])->name('profile.updatePassword');
Route::put('/profile/{id}' ,[profileController::class, 'update'])->name('profile.update');


Route::middleware(['Admin'])->group( function(){
// crud admin
Route::resource('/admin', adminController::class);
Route::resource('/dosen', dosenController::class);
Route::resource('/matkul', matkulController::class);
Route::resource('/pengajuan', pengajuanController::class);

// verifikasi

// approve
Route::post('/pengajuan/{id}/approve/prodi' ,[verifikasiController::class, 'ApproveProdi'])->name('approve.prodi');
Route::post('/pengajuan/{id}/approve/akademik' ,[verifikasiController::class, 'ApproveAkademik'])->name('approve.akademik');
// rejected
Route::post('/pengajuan/{id}/rejected/prodi' ,[verifikasiController::class, 'RejectedProdi'])->name('rejected.prodi');
Route::post('/pengajuan/{id}/rejected/akademik' ,[verifikasiController::class, 'RejectedAkademik'])->name('rejected.akademik');


});



Route::middleware(['Prodi'])->group( function(){

// approve
Route::post('/pengajuan/{id}/approve/prodi' ,[verifikasiController::class, 'ApproveProdi'])->name('approve.prodi');
// rejected
Route::post('/pengajuan/{id}/rejected/prodi' ,[verifikasiController::class, 'RejectedProdi'])->name('rejected.prodi');

Route::get('/verifikasi-mahasiswa' ,[prodiController::class, 'index'])->name('verifikasi.mahasiswa');

});



Route::middleware(['Dosen'])->group( function(){

Route::get('/mahasiswa-sp', [perbaikanController::class,'index'])->name('mahasiswa.index');
// memberi tugas
Route::get('/daftar-tugas', [tugasController::class, 'index'])->name('tugas.index');
Route::get('/tugas/create/{user_id}', [TugasController::class, 'create'])->name('tugas.create');
Route::post('tugas/store', [TugasController::class, 'store'])->name('tugas.store');
// nilai tugas
Route::get('tugas/nilai/{id}', [TugasController::class, 'nilaiForm'])->name('tugas.nilaiForm');
Route::post('tugas/nilai/{id}', [TugasController::class, 'nilai'])->name('tugas.nilai');

});


Route::middleware(['Akademik'])->group( function(){

// approve
Route::post('/pengajuan/{id}/approve/akademik' ,[verifikasiController::class, 'ApproveAkademik'])->name('approve.akademik');
// rejected
Route::post('/pengajuan/{id}/rejected/akademik' ,[verifikasiController::class, 'RejectedAkademik'])->name('rejected.akademik');

Route::get('/verifikasi' ,[verifikasiController::class, 'index'])->name('verifikasi.index');

});



Route::middleware(['Mahasiswa'])->group( function(){

    Route::get('/pilih/matkul', [pendaftaranController::class, 'index'])->name('pendaftaran.index');
    Route::get('/status/pendaftaran', [pendaftaranController::class, 'status'])->name('pendaftaran.status');
    Route::post('/pendaftaran', [pendaftaranController::class, 'store'])->name('pendaftaran.store');
    Route::get('/pendaftaran/{id}', [pendaftaranController::class, 'create'])->name('pendaftaran.create');
    // submit tugas
    Route::get('tugas/submit/{id}', [mahasiswaController::class, 'submitForm'])->name('tugas.submitForm');
    Route::post('tugas/submit/{id}', [TugasController::class, 'submit'])->name('tugas.submit');
    // daftar tugas
    Route::get('daftar/tugas', [mahasiswaController::class, 'index'])->name('daftartugas.index');

});







});

