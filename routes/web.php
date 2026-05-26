<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\TipoContatosController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('contatos', ContatoController::class)->middleware(['auth','verified'])->names([
    'index' => 'contatos.index',
    'create' => 'contatos.create',
    'store' => 'contatos.store',
    'show' => 'contatos.show',
    'edit' => 'contatos.edit',
    'update' => 'contatos.update',
    'destroy' => 'contatos.destroy',
]);

Route::resource('tipo-contatos', TipoContatosController::class)->middleware(['auth','verified'])->names([
    'index' => 'tipo-contatos.index',
    'create' => 'tipo-contatos.create',
    'store' => 'tipo-contatos.store',
    'show' => 'tipo-contatos.show',
    'edit' => 'tipo-contatos.edit',
    'update' => 'tipo-contatos.update',
    'destroy' => 'tipo-contatos.destroy',
]);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
