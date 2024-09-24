<?php

namespace App\Services;
use App\Models\Autor;
use App\Models\Livro;
use App\Models\LivroAssunto;
use App\Repositories\AbstractRepository;
use App\Repositories\LivroAssuntoRepository;
use App\Repositories\LivroRepository;

class LivroAssuntoService extends AbstractRepository {

    public LivroAssunto $livroAssunto;

    public function __construct(LivroAssunto $livroAssunto){
        $this->model = $livroAssunto;
    }

    public function salvarAssunto($request, $idLivro): mixed {
        
        $repository = new LivroAssuntoRepository($this->model);

        $repository->deletarListaIds($request->assunto);

        $livroAssuntoNew = new LivroAssunto();
        $livroAssuntoNew->assunto_id = $request->assunto;
        $livroAssuntoNew->livro_id = $idLivro;

        $result = $repository->salvar($livroAssuntoNew);

        return $result;
    }

}
