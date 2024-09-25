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

    public function __construct(LivroAutor $livroAutor){
        $this->model = $livroAutor;
    }

    public function salvarAutor($request, $idLivro): void {
        
        $repository = new LivroAutorRepository($this->model);

        if($request->id){
            $repository->deletarAssuntoAutorIds($idLivro);
        }

        foreach ($request->autor as $key => $value) {
            $livroAutorNew = new LivroAutor();
            $livroAutorNew->autor_id = $value;
            $livroAutorNew->livro_id = $idLivro;

            $repository->salvar($livroAutorNew);

        }
    }

}
