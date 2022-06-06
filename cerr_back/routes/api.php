<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ParteTrabajoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('gerencia')->group(function () {
    Route::prefix('clientes')->group(function () {
        Route::get('',[ClientController::class, 'getAll']);
        Route::get('{id}', [ClientController::class, 'getId']);
        Route::post('', [ClientController::class, 'crearCliente']);
        Route::delete('{id}/delete', [ClientController::class , 'deleteCliente']);
        Route::post('{id}/editar', [ClientController::class, 'editarCliente']);
    });

    Route::prefix('trabajadores')->group(function () {
        Route::get('',[EmployeeController::class, 'getAllTrabajadores']);
        Route::get('{id}', [EmployeeController::class, 'getIdTrabajador']);
        Route::post('', [EmployeeController::class, 'crearTrabajador']);
        Route::delete('{id}/delete', [EmployeeController::class , 'deleteTrabajador']);
        Route::post('{id}/editar', [EmployeeController::class, 'editarTrabajador']);
    });
});

Route::prefix('trabajador')->group(function () {
    Route::prefix('partesTrabajo')->group(function () {
        Route::get('',[ParteTrabajoController::class, 'getAllPartes']);
        Route::get('{id}', [ParteTrabajoController::class, 'getIdParte']);
        Route::post('', [ParteTrabajoController::class, 'crearParte']);
        Route::delete('{id}/delete', [ParteTrabajoController::class , 'deleteParte']);
        Route::post('{id}/editar', [ParteTrabajoController::class, 'editarParte']);
    });
});

