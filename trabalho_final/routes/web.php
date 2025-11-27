<?php

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;

// Login (Público)
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Cookie de Tema (Req 5)
Route::get('/toggle-theme', function () {
    $current = Cookie::get('theme', 'light');
    $new = $current === 'dark' ? 'light' : 'dark';
    return back()->withCookie(cookie('theme', $new, 60)); // Cookie de 60min
})->name('toggle.theme');

// Protegidas (Sessão Obrigatória - Req 3)
Route::middleware(['auth'])->group(function () {
    Route::resource('produtos', ProdutoController::class)->except(['show', 'create']);
    Route::resource('categorias', CategoriaController::class)->except(['show', 'create']);
});