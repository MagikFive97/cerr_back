<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

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
    Route::get('partesTrabajo', [ParteTrabajoController::class, 'getAll']);
});
