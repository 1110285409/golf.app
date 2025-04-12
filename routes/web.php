<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CampoController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\ReservaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // Rutas para Campos
    Route::resource('campos', CampoController::class);
    
    // Rutas para Jugadores
    Route::resource('jugadores', JugadorController::class);
    
    // Rutas para Reservas
    Route::resource('reservas', ReservaController::class);
});

// Rutas de perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
