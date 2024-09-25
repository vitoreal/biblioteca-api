<?php

namespace App\Repositories;

class LivroRepository extends AbstractRepository {

    public function verificaLivroExiste($request){
        $total= $this->model
        ->where('titulo', $request->titulo)
        ->where('editora', $request->editora)
        ->where('edicao', $request->edicao)
        ->count();
        return $total;
    }

    public function listarPagination($startRow, $limit, $sortBy, $orderBy){

        if($sortBy == ''){
            $sortBy = 'asc';
        }
        if($startRow == ''){
            $startRow = 1;
        }
        if($limit == ''){
            $limit = 10;
        }

        $query = $this->model;
        $total = $query->count();
        $lista = $query->offset($startRow)->limit($limit)->orderBy($orderBy, $sortBy)->get();
        foreach ($lista as $key => $value) {
            $value->assuntos;
            $value->autores;
        }
        $result = [
            'total' => $total,
            'lista' => $lista
        ];

       return $result;

    }

}
