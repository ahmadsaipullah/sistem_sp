<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\prodiController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\perbaikanController;
use App\Http\Controllers\verifikasiController;
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

});


Route::middleware(['Akademik'])->group( function(){

// approve
Route::post('/pengajuan/{id}/approve/akademik' ,[verifikasiController::class, 'ApproveAkademik'])->name('approve.akademik');
// rejected
Route::post('/pengajuan/{id}/rejected/akademik' ,[verifikasiController::class, 'RejectedAkademik'])->name('rejected.akademik');

Route::get('/verifikasi' ,[verifikasiController::class, 'index'])->name('verifikasi.index');

});



Route::middleware(['Mahasiswa'])->group( function(){



});







});

