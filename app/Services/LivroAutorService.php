<?php

namespace App\Services;
use App\Models\Autor;
use App\Models\Livro;
use App\Models\LivroAssunto;
use App\Models\LivroAutor;
use App\Repositories\AbstractRepository;
use App\Repositories\LivroAssuntoRepository;
use App\Repositories\LivroAutorRepository;
use App\Repositories\LivroRepository;

class LivroAutorService extends AbstractRepository {

    public LivroAutor $livroAutor;

    public function __construct(LivroAutor $livroAutor){
        $this->model = $livroAutor;
    }

    public function salvarAutor($request, $idLivro): mixed {
        
        $repository = new LivroAutorRepository($this->model);

        $repository->deletarListaIds($request->assunto);

        $livroAutorNew = new LivroAutor();
        $livroAutorNew->autor_id = $request->autor;
        $livroAutorNew->livro_id = $idLivro;

        $result = $repository->salvar($livroAutorNew);

        return $result;
    }

}
