<?php

use App\Http\Controllers\Autor\BuscarAutorController;
use App\Http\Controllers\Autor\ExcluirAutorController;
use App\Http\Controllers\Autor\ListarAutorController;
use App\Http\Controllers\Autor\ListarAutorPaginationController;
use App\Http\Controllers\Autor\SalvarAutorController;
use Illuminate\Routing\Route;

Route::get('/autor/listar/{startRow}/{limit}', ListarAutorPaginationController::class);
Route::post('/autor/salvar', SalvarAutorController::class);
Route::get('/autor/buscar/{id}', BuscarAutorController::class);
Route::post('/autor/excluir', ExcluirAutorController::class);
Route::get('/autor/listar-autor', ListarAutorController::class);
