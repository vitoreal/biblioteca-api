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

}
