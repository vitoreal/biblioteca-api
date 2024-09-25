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

    public function salvarAssunto($request, $idLivro): void {
        
        $repository = new LivroAssuntoRepository($this->model);

        if($request->id){
            $repository->deletarAssuntoAutorIds($idLivro);
        }

        foreach ($request->assunto as $key => $value) {
            $livroAssuntoNew = new LivroAssunto();
            $livroAssuntoNew->assunto_id = $value;
            $livroAssuntoNew->livro_id = $idLivro;

            $repository->salvar($livroAssuntoNew);
        }
    }

}
