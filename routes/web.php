<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DimensionController;
use App\Http\Controllers\MaterialController;
Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rutas para Artículos
    Route::get('articulos', [ArticuloController::class, 'index'])->name('articulos.index');
    Route::get('articulos/create', [ArticuloController::class, 'create'])->name('articulos.create');

    // Rutas para Categorías
    Route::get('categorias', [CategoriaController::class, 'index'])->name('categorias.index');
    Route::get('categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');

    // Rutas para Materiales
    Route::get('materiales', [MaterialController::class, 'index'])->name('materiales.index');
    
   

    Route::get('/articulos/{articulo}/edit', [ArticuloController::class, 'edit'])->name('articulos.edit');
    Route::get('/articulos/{articulo}', [ArticuloController::class, 'show'])->name('articulos.show');

        // Ruta para ver detalle
    // Route::get('/articulos/{articulo}', function(ArticuloController $articulo) {
    //     return view('articulos.show', compact('articulo'));
    // })->name('articulos.show');

    Route::get('/dimensiones', [DimensionController::class, 'index'])->name('dimensiones.index');

});
