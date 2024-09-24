<?php

namespace App\Http\Controllers\Assunto;

use App\Http\Controllers\Controller;
use App\Services\AssuntoService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class ListarAssuntoPaginationController extends Controller
{

    protected AssuntoService $service;

    public function __construct(AssuntoService $service){
        $this->service = $service;
    }

    public function __invoke( string $startRow, string $limit): JsonResponse {

        try {
            
            $lista = $this->service->listarPagination($startRow, $limit, 'asc', 'id');

            $retorno = ['lista' => $lista ];
            return response()->json($retorno, Response::HTTP_OK);


        } catch (Throwable $e ) {
            $retorno = [ 'type' => 'ERROR', 'mensagem' => 'Não foi possível realizar a sua solicitação!' ];
            return response()->json($retorno, Response::HTTP_BAD_REQUEST);
        }

    }
}
