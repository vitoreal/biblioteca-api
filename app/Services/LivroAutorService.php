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

    public function salvarAutor($request, $idLivro): void {
        
        $repository = new LivroAutorRepository($this->model);

        $idsAssunto = json_decode($request->autor);

        if($request->id){
            $repository->deletarAssuntoAutorIds($idLivro);
        }

        foreach ($idsAssunto as $key => $value) {
            $livroAutorNew = new LivroAutor();
            $livroAutorNew->autor_id = $value;
            $livroAutorNew->livro_id = $idLivro;

            $repository->salvar($livroAutorNew);

        }
    }

}
