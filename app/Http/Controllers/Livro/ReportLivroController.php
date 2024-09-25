<?php

namespace App\Http\Controllers\Livro;

use App\Http\Controllers\Controller;
use App\Services\LivroService;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;
use Throwable;
use Mpdf\Mpdf;

class ReportLivroController extends Controller
{

    public function __construct(LivroService $service){
        $this->service = $service;
    }

    public function __invoke(): void {

        try {
           // $mpdf = new Mpdf();

            $result = $this->service->buscarReport();
            
            if($result){

                $livro = [];
                $firstId = 0;

                foreach ($result as $key => $value) {

                    if ($firstId != $value->id) {
                        $livro[$key]['id'] = $value->id;
                        $livro[$key]['titulo'] = $value->titulo;
                        $livro[$key]['editora'] = $value->editora;
                        $livro[$key]['edicao'] = $value->edicao;
                        $livro[$key]['ano_publicacao'] = $value->ano_publicacao;
                        $firstId = $value->id;
                    }
                   
                }
                
                array_values($livro); // Acertando as chaves do array

                foreach ($livro as $keyLivro => $valueLivro) {
                    
                    $firstAssunto = 0;
                    foreach ($result as $key => $value) {
                        // pegando os assuntos do livro
                        if($value->id == $valueLivro['id'] && $firstAssunto != $value->assunto){
                            $livro[$keyLivro]['assuntos'][] = $value->assunto;
                            $firstAssunto = $value->assunto;
                        }     
                    }

                    $firstAutor = 0;
                    foreach ($result as $keyAutor => $valueAutor) {
                        // pegando os autores do livro
                        if($valueAutor->id == $valueLivro['id'] && $firstAutor != $valueAutor->autor){
                            $livro[$keyLivro]['autores'][] = $valueAutor->autor;
                            $firstAutor = $valueAutor->autor;
                        }   
                        array_unique($livro[$keyLivro]['autores']);  
                    }
                    
                }
               
                dd($livro);
                // Write some HTML code:
               // $mpdf->WriteHTML(view('welcome', $result));

               // $mpdf->Output();

            } else {
               
                $mpdf = new Mpdf();
                $mpdf->WriteHTML('Não foi encontrado nenhum resultado!');
                $mpdf->Output();
                
            }
            

        } catch (Throwable $e ) {
             /*
            $mpdf = new Mpdf();
            $mpdf->WriteHTML('Não foi possível realizar a sua solicitação!');
            $mpdf->Output();
            */
        }

        
    }
}
