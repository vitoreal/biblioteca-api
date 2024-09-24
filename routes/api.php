<?php

use App\Http\Controllers\Assunto\BuscarAssuntoController;
use App\Http\Controllers\Assunto\ExcluirAssuntoController;
use App\Http\Controllers\Assunto\ListarAssuntoController;
use App\Http\Controllers\Assunto\SalvarAssuntoController;
use App\Http\Controllers\Assunto\ListarAssuntoPaginationController;
use App\Http\Controllers\Autor\BuscarAutorController;
use App\Http\Controllers\Autor\ExcluirAutorController;
use App\Http\Controllers\Autor\ListarAutorController;
use App\Http\Controllers\Autor\SalvarAutorController;
use Illuminate\Support\Facades\Route;

// Assunto
Route::get('/assunto/listar/{startRow}/{limit}', ListarAssuntoPaginationController::class);
Route::post('/assunto/salvar', SalvarAssuntoController::class);
Route::get('/assunto/buscar/{id}', BuscarAssuntoController::class);
Route::post('/assunto/excluir', ExcluirAssuntoController::class);
Route::get('/assunto/listar-assunto', ListarAssuntoController::class);

// Autor
Route::get('/autor/listar/{startRow}/{limit}', ListarAssuntoPaginationController::class);
Route::post('/autor/salvar', SalvarAutorController::class);
Route::get('/autor/buscar/{id}', BuscarAutorController::class);
Route::post('/autor/excluir', ExcluirAutorController::class);
Route::get('/autor/listar-autor', ListarAutorController::class);