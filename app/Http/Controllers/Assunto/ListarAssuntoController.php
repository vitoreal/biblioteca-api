<?php

namespace App\Http\Controllers\Assunto;

use App\Http\Controllers\Controller;
use App\Services\AssuntoService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class ListarAssuntoController extends Controller
{

    public function __construct(AssuntoService $service){
        $this->service = $service;
    }

    public function __invoke(): JsonResponse {

        try {
            
            $lista = $this->service->findAll();

            $retorno = ['lista' => $lista ];
            return response()->json($retorno, Response::HTTP_OK);


        } catch (Throwable $e ) {
            $retorno = [ 'type' => 'ERROR', 'mensagem' => 'Não foi possível realizar a sua solicitação!' ];
            return response()->json($retorno, Response::HTTP_BAD_REQUEST);
        }

    }
}
