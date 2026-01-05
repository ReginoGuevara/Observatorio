<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\HomeController;

// Rutas de autenticación (ya las tienes)
Auth::routes();

// Ruta principal
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Dashboard/Home
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Rutas protegidas
Route::middleware(['auth'])->group(function () {
    // Personas - Rutas CRUD completas
    Route::resource('personas', PersonaController::class);
    
    // Proyectos - Rutas CRUD completas
    Route::resource('proyectos', ProyectoController::class);

    // Export CSV
    Route::get('proyectos-export/csv', [ProyectoController::class, 'exportCsv'])->name('proyectos.export');
});