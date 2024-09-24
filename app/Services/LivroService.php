<?php

namespace App\Services;
use App\Models\Autor;
use App\Models\Livro;
use App\Repositories\AbstractRepository;
use App\Repositories\LivroRepository;

class LivroService extends AbstractRepository {

    public Livro $livro;

    public function __construct(Autor $livro){
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
        $livro->anoPublicacao = $request->anoPublicacao;
        $livro->valor = $request->valor;

        $result = $repository->salvar($livro);

        return $result;
    }

}
