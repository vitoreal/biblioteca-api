<?php

use App\Http\Controllers\Assunto\BuscarAssuntoController;
use App\Http\Controllers\Assunto\ExcluirAssuntoController;
use App\Http\Controllers\Assunto\SalvarAssuntoController;
use App\Http\Controllers\Assunto\ListarAssuntoController;
use App\Http\Controllers\Autor\BuscarAutorController;
use App\Http\Controllers\Autor\ExcluirAutorController;
use App\Http\Controllers\Autor\ListarAutorController;
use App\Http\Controllers\Autor\SalvarAutorController;
use Illuminate\Support\Facades\Route;

// Assunto
Route::get('/assunto/listar/{startRow}/{limit}', ListarAssuntoController::class);
Route::post('/assunto/salvar', SalvarAssuntoController::class);
Route::get('/assunto/buscar/{id}', BuscarAssuntoController::class);
Route::post('/assunto/excluir', ExcluirAssuntoController::class);

// Autor
Route::get('/autor/listar/{startRow}/{limit}', ListarAutorController::class);
Route::post('/autor/salvar', SalvarAutorController::class);
Route::get('/autor/buscar/{id}', BuscarAutorController::class);
Route::post('/autor/excluir', ExcluirAutorController::class);