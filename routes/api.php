<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatalogoServiciosController;
use Illuminate\Support\Facades\Route;



Route::prefix('v1')->group(function () {
    
    Route::get('/hola', function(){
        return 'Hello World';
    });
    
    Route::prefix('auth')->group(function () {
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/register', [AuthController::class, 'register']);
    });
        
        
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('/logout', [AuthController::class, 'logout']);       
    });

    
    Route::get('/catalogoServicios', [CatalogoServiciosController::class, 'index']);
    

});
