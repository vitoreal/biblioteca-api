<?php

namespace App\Repositories;

class AutorRepository extends AbstractRepository {

    public function verificarNomeExiste($nome){
        $total= $this->model->where('nome', $nome)->count();
        return $total;
    }

}
