<?php

use App\Http\Controllers\Assunto\BuscarAssuntoController;
use App\Http\Controllers\Assunto\SalvarAssuntoController;
use App\Http\Controllers\Assunto\ListarAssuntoController;
use Illuminate\Support\Facades\Route;

Route::get('/assunto/listar/{startRow}/{limit}', ListarAssuntoController::class);
Route::post('/assunto/salvar', SalvarAssuntoController::class);
Route::get('/assunto/buscar/{id}', BuscarAssuntoController::class);