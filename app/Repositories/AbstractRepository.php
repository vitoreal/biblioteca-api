<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository {

    public function __construct(Model $model){
        $this->model = $model;
    }

    public function findAll()
    {
        $this->model = $this->model->all();
        return  $this->model;
    }

    public function salvar($request){

        $resposta = $request->save();
        return $resposta; // true or false

    }

    public function buscarPorId(int $id){
        $this->model = $this->model->find($id);
        return $this->model;
    }

    public function totalRegistroPorIdUser($id){
        $total = $this->model->where('user_id', $id)->count();
        return $total;
    }

    public function buscarRegistroPorIdUser($id){
        $this->model = $this->model->where('user_id', $id)->get();
        return $this->model;
    }

    public function excluir($id): bool{
        $model = $this->model->find($id);
        return $model->delete();
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

        $result = [
            'total' => $total,
            'lista' => $lista
        ];

       return $result;

    }


}
