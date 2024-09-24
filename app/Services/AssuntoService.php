<?php

namespace App\Services;
use App\Models\Assunto;
use App\Repositories\AbstractRepository;
use App\Repositories\AssuntoRepository;

class AssuntoService extends AbstractRepository {

    public Assunto $assunto;

    public function __construct(Assunto $assunto){
        $this->model = $assunto;
    }

    public function listarPagination($startRow, $limit, $sortBy, $orderBy): array{
        
        $repository = new AssuntoRepository($this->model);

        $lista = $repository->listarPagination($startRow, $limit, $sortBy, $orderBy);

        return $lista;
    }

    public function verificarNomeExiste($request): int {
        
        $repository = new AssuntoRepository($this->model);

        $total = $repository->verificarNomeExiste($request->descricao);
            
        return $total;

    }
    public function salvar($request): mixed {
        
        // Alterando os dados do usuario
        $repository = new AssuntoRepository($this->model);

        $acao = ['cadastrado', 'cadastrar'];

        if($request->id){

            $assunto = $repository->buscarPorId($request->id);
            $acao = ['alterado', 'alterar'];

        } else {
            $assunto = new Assunto();
        }

        $assunto->descricao = $request->descricao;

        $result = $repository->salvar($assunto);

        return $result;
    }

}
