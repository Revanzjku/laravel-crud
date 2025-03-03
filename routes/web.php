<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// CRUD data Pegawai dengan Query Builder 
Route::get('/pegawai', [PegawaiController::class, 'pegawai']);
Route::get('/pegawai/search', [PegawaiController::class, 'search']);
Route::get('/pegawai/tambah', [PegawaiController::class, 'tambah']);
Route::post('/pegawai/tambah/store', [PegawaiController::class, 'store']);
Route::get('/pegawai/edit/{id}', [PegawaiController::class, 'edit']);
Route::post('/pegawai/update', [PegawaiController::class, 'update']);
Route::get('/pegawai/hapus/{id}', [PegawaiController::class, 'hapus']);

// CRUD data Mahasiswa dengan ORM
Route::get('/mahasiswa', [MahasiswaController::class, 'mahasiswa']);
Route::get('/mahasiswa/search', [MahasiswaController::class, 'search']);
Route::get('/mahasiswa/tambah', [MahasiswaController::class, 'tambah']);
Route::post('/mahasiswa/tambah/store', [MahasiswaController::class, 'store']);