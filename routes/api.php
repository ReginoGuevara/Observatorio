<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\Api\ProyectoApiController;
use App\Http\Controllers\Api\PersonaApiController;

Route::get('proyectos', [ProyectoApiController::class, 'index']);
Route::get('proyectos/{id}', [ProyectoApiController::class, 'show']);

Route::get('personas', [PersonaApiController::class, 'index']);
Route::get('personas/{id}', [PersonaApiController::class, 'show']);
