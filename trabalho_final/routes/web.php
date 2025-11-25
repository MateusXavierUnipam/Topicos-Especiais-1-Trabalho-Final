<?php

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('produtos.index');
});

// Produtos
Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');

// Categorias
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');

