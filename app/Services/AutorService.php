<?php

namespace App\Services;
use App\Models\Autor;
use App\Repositories\AbstractRepository;
use App\Repositories\AutorRepository;

class AutorService extends AbstractRepository {

    public Autor $autor;

    public function __construct(Autor $autor){
        $this->model = $autor;
    }

    public function listarPagination($startRow, $limit, $sortBy, $orderBy): array{
        
        $repository = new AutorRepository($this->model);

        $lista = $repository->listarPagination($startRow, $limit, $sortBy, $orderBy);

        return $lista;
    }

    public function verificarNomeExiste($request): int {
        
        $repository = new AutorRepository($this->model);

        $total = $repository->verificarNomeExiste($request->nome);
            
        return $total;

    }
    public function salvar($request): mixed {
        
        $repository = new AutorRepository($this->model);

        if($request->id){
            $autor = $repository->buscarPorId($request->id);
        } else {
            $autor = new Autor();
        }

        $autor->descricao = $request->descricao;

        $result = $repository->salvar($autor);

        return $result;
    }

}
