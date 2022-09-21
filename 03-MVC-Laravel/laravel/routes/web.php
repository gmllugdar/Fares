<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\PeliculaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'as' => 'peliculas.',
    'prefix' => 'pelicula',
], function () {
    Route::get('/', [PeliculaController::class, 'index'])->name('index');
    Route::get('/crear', [PeliculaController::class, 'create'])->name('create');
    Route::post('/', [PeliculaController::class, 'store'])->name('store');
    Route::get('/{peli}/editar', [PeliculaController::class, 'edit'])->name('edit');
    Route::put('/{peli}', [PeliculaController::class, 'update'])->name('update');
    Route::delete('/{peli}', [PeliculaController::class, 'destroy'])->name('destroy');
});

Route::group([
    'as' => 'actores.',
    'prefix' => 'actor',
], function () {
    Route::get('/', [ActorController::class, 'index'])->name('index');
    Route::get('/crear', [ActorController::class, 'create'])->name('create');
    Route::post('/', [ActorController::class, 'store'])->name('store');
    Route::get('/{actor}/editar', [ActorController::class, 'edit'])->name('edit');
    Route::put('/{actor}', [ActorController::class, 'update'])->name('update');
    Route::delete('/{actor}', [ActorController::class, 'destroy'])->name('destroy');
});
