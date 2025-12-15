<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

// Ruta principal - redirige a categorías
Route::get('/', function () {
    return redirect()->route('categories.index');
});

// Rutas para el perfil (se muestran siempre)
Route::get('/perfil/{id?}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/perfil/{id}/editar', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/perfil/{id}', [ProfileController::class, 'update'])->name('profile.update');

// Rutas CRUD principales
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('suppliers', \App\Http\Controllers\SupplierController::class);

// Vista combinada
Route::get('/categorias-productos', [CategoryController::class, 'showWithProducts'])->name('categories.with.products');
