<?php

namespace App\Repositories;

class AssuntoRepository extends AbstractRepository {

    public function verificarNomeExiste($descricao){
        $total= $this->model->where('descricao', $descricao)->count();
        return $total;
    }

}
