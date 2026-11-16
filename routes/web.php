<?php

use App\Http\Controllers\EventoController;
use App\Http\Controllers\InicioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoController;

Route::get('/', [InicioController::class, 'index'])->name('inicio');
Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');
Route::get('/eventos/{evento}', [EventoController::class, 'show'])
    ->whereNumber('evento')
    ->name('eventos.show');
Route::get('/tipos/{tipo:slug}', [TipoController::class, 'show'])->name('tipos.show');

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

#