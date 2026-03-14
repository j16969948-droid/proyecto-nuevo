<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\PagoEmailController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\SystemController;

use App\Http\Controllers\PagoEntranteController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;



Route::prefix('v1')->group(function () {

    Route::get('/hola', function () {
        return 'Hello World';
    });

    Route::prefix('auth')->group(function () {
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/register', [AuthController::class, 'register']);
    });

    // Public services routes
    Route::prefix('servicios')->group(function () {
        Route::get('/', [ServicioController::class, 'index']);
        Route::get('/{id}', [ServicioController::class, 'show']);
        });

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('/sidebar', [SystemController::class, 'sideBarXrole']);
        Route::get('/logout', [AuthController::class, 'logout']);

        Route::get('/pagos/email', [PagoEmailController::class, 'index']);

        Route::prefix('role')->group(function () {
            Route::get('/list', [RoleController::class, 'index']);
        });

        Route::prefix('usuario')->group(function () {
            Route::get('/list', [UsuarioController::class, 'index']);
        });

        Route::prefix('inventario')->group(function () {
            Route::get('', [InventarioController::class, 'index']);
            Route::post('', [InventarioController::class, 'store']);
            Route::put('/{id}', [InventarioController::class, 'update']);
            Route::delete('/{id}', [InventarioController::class, 'destroy']);
        });

        Route::prefix('servicios')->group(function () {
            Route::post('/', [ServicioController::class, 'store']);
            Route::patch('/{id}', [ServicioController::class, 'update']);
            Route::delete('/{id}', [ServicioController::class, 'destroy']);
        });


        Route::prefix('pagos-entrantes')->group(function () {
            Route::get('/', [PagoEntranteController::class, 'index']);
            Route::get('/{id}', [PagoEntranteController::class, 'show']);
            Route::post('/', [PagoEntranteController::class, 'store']);
            Route::patch('/{id}', [PagoEntranteController::class, 'update']);
        });
    });
});
