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
    // Personas - Rutas de export ANTES de resource
    Route::get('personas/export/csv', [PersonaController::class, 'exportCsv'])->name('personas.export-csv');
    Route::get('personas/export/pdf', [PersonaController::class, 'exportPdf'])->name('personas.export-pdf');
    Route::resource('personas', PersonaController::class);
    
    // Proyectos - Rutas de export ANTES de resource
    Route::get('proyectos/export/csv', [ProyectoController::class, 'exportCsv'])->name('proyectos.export-csv');
    Route::get('proyectos/export/pdf', [ProyectoController::class, 'exportPdf'])->name('proyectos.export-pdf');
    Route::resource('proyectos', ProyectoController::class);
});