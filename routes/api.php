<?php

use App\Http\Controllers\Assunto\SalvarAssuntoController;
use App\Http\Controllers\Assunto\ListarAssuntoController;
use Illuminate\Support\Facades\Route;

Route::get('/assunto', ListarAssuntoController::class);
Route::post('/assunto/salvar', SalvarAssuntoController::class);