<?php

use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\AnggotaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BukuController;

Route::get('/', [AuthController::class, 'login']);
Route::post('/proses-login', [AuthController::class, 'prosesLogin']);
Route::get('/logout', [AuthController::class, 'logout']);


Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/anggota', [AnggotaController::class, 'index']);
Route::post('/anggota/store', [AnggotaController::class, 'store']);
Route::get('/anggota/delete/{id}', [AnggotaController::class, 'delete']);
Route::post('/anggota/update/{id}', [AnggotaController::class, 'update']);

Route::get('buku', [BukuController::class, 'index']);
Route::post('buku/store', [BukuController::class, 'store']);
Route::post('buku/update/{id}', [BukuController::class, 'update']);
Route::get('buku/delete/{id}', [BukuController::class, 'delete']);

Route::get('/peminjaman', [PeminjamanController::class, 'index']);
Route::post('/peminjaman/store', [PeminjamanController::class, 'store']);
Route::get('/peminjaman/kembali/{id}', [PeminjamanController::class, 'kembali']);
