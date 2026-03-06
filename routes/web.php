<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiciosController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ServiciosController::class , 'index']);

Route::get('/login', [AuthController::class , 'showLogin']);
Route::post('/login', [AuthController::class , 'login']);
Route::get('/logout', [AuthController::class , 'logout']);


Route::get('/dashboard', function () {
//
})->middleware(['auth.session', 'redirect.role']);

Route::middleware(['auth.session', 'role:cliente'])->prefix('cliente')->group(function () {
    Route::view('/', 'cliente.dashboard');
});

Route::middleware(['auth.session', 'role:revendedor'])->prefix('revendedor')->group(function () {
    Route::view('/', 'revendedor.dashboard');
});

Route::middleware(['auth.session', 'role:admin'])->prefix('admin')->group(function () {
    Route::view('/', 'admin.dashboard');
});

Route::middleware(['auth.session', 'role:superadmin'])->prefix('superadmin')->group(function () {
    Route::view('/', 'superadmin.dashboard');
});