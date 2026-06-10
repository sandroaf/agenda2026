<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\AuthApiController;

Route::post('/token', [AuthApiController::class, 'token']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/contatos', [ContatoController::class, 'apiIndex']);
    Route::get('/contatos/{id}', [ContatoController::class, 'apiShow']);
});
