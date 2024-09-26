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

    public function __invoke() {

        try {
           $mpdf = new Mpdf();

            $result = $this->service->buscarReport();

            if($result){

                $listaLivros = [];
                $firstId = 0;

                foreach ($result as $key => $value) {

                    if ($firstId != $value->id) {
                        $listaLivros[$key]['id'] = $value->id;
                        $listaLivros[$key]['titulo'] = $value->titulo;
                        $listaLivros[$key]['editora'] = $value->editora;
                        $listaLivros[$key]['edicao'] = $value->edicao;
                        $listaLivros[$key]['ano_publicacao'] = $value->ano_publicacao;
                        $listaLivros[$key]['valor'] = str_replace('.',',', $value->valor);;
                        $firstId = $value->id;
                    }

                }

                $listaLivros = array_values($listaLivros); // Acertando as chaves do array

                foreach ($listaLivros as $keyLivro => $valueLivro) {

                    $firstAssunto = 0;
                    foreach ($result as $key => $value) {
                        // pegando os assuntos do livro
                        if($value->id == $valueLivro['id'] && $firstAssunto != $value->assunto){
                            $listaLivros[$keyLivro]['assuntos'][] = $value->assunto;
                            $firstAssunto = $value->assunto;
                        }
                    }

                    $firstAutor = 0;
                    foreach ($result as $keyAutor => $valueAutor) {
                        // pegando os autores do livro
                        if($valueAutor->id == $valueLivro['id'] && $firstAutor != $valueAutor->autor){
                            $listaLivros[$keyLivro]['autores'][] = $valueAutor->autor;
                            $firstAutor = $valueAutor->autor;
                        }

                    }

                }

                foreach ($listaLivros as $key => $value) {
                    $listaLivros[$key]['autores'] = array_unique($value['autores']);
                }

                //dd($listaLivros);
                // Write some HTML code:
                //return view('report', ['livros' => $listaLivros]);

               $mpdf->WriteHTML(view('report', ['livros' => $listaLivros]));
               $mpdf->Output();

            } else {

                $mpdf = new Mpdf();
                $mpdf->WriteHTML('Não foi encontrado nenhum resultado!');
                $mpdf->debug = true;
                $mpdf->Output();

            }


        } catch (Throwable $e ) {
            $mpdf = new Mpdf();
            $mpdf->WriteHTML('Não foi possível realizar a sua solicitação!');
            $mpdf->debug = true;
            $mpdf->Output();
        }


    }
}
