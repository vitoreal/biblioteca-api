<?php

namespace App\Services;
use App\Models\Autor;
use App\Models\Livro;
use App\Repositories\AbstractRepository;
use App\Repositories\LivroRepository;

class LivroService extends AbstractRepository {

    public function __construct(Livro $livro){
        $this->model = $livro;
    }

    public function listarPagination($startRow, $limit, $sortBy, $orderBy): array{
        
        $repository = new LivroRepository($this->model);

        $lista = $repository->listarPagination($startRow, $limit, $sortBy, $orderBy);

        return $lista;
    }

    public function verificaLivroExiste($request): int {
        
        $repository = new LivroRepository($this->model);

        $total = $repository->verificaLivroExiste($request);
            
        return $total;

    }
    public function salvar($request): mixed {
        
        $repository = new LivroRepository($this->model);

        if($request->id){
            $livro = $repository->buscarPorId($request->id);
        } else {
            $livro = new Livro();
        }

        $livro->titulo = $request->titulo;
        $livro->editora = $request->editora;
        $livro->edicao = $request->edicao;
        $livro->ano_publicacao = $request->anoPublicacao;

        $valor = str_replace(',','.', $request->valor);

        $livro->valor = $valor;

        $result = $repository->salvar($livro);

        return $result;
    }

    public function buscarReport(){
        $repository = new LivroRepository($this->model);
        return $repository->buscarReport();
    }

}
