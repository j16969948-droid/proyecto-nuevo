<?php

use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('public.servicios');
});

/* LOGIN */

Route::get('/login', [AuthController::class , 'showLogin']);
Route::post('/login', [AuthController::class , 'login']);
Route::get('/logout', [AuthController::class , 'logout']);

/* DASHBOARDS */

Route::view('/cliente', 'cliente.dashboard')
    ->middleware(['auth.session', 'role:cliente']);

Route::view('/revendedor', 'revendedor.dashboard')
    ->middleware(['auth.session', 'role:revendedor']);

Route::view('/admin', 'admin.dashboard')
    ->middleware(['auth.session', 'role:admin']);

Route::view('/superadmin', 'superadmin.dashboard')
    ->middleware(['auth.session', 'role:superadmin']);