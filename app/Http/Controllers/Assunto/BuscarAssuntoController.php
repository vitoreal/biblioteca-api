<?php

namespace App\Http\Controllers\Assunto;

use App\Http\Controllers\Controller;
use App\Services\AssuntoService;
use ErrorException;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\CssSelector\Exception\InternalErrorException;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class BuscarAssuntoController extends Controller
{

    protected AssuntoService $service;

    public function __construct(AssuntoService $service){
        $this->service = $service;
    }

    public function __invoke(int $id): JsonResponse {

        try {
            
            $result = $this->service->buscarPorId($id);

            if($result){
                $retorno = ['result' => $result ];
                return response()->json($retorno, Response::HTTP_OK);
            }

            $retorno = [ 'type' => 'ERROR', 'mensagem' => 'Nenhum resultado encontrado!' ];
            return response()->json($retorno, Response::HTTP_BAD_REQUEST);

        } catch (Throwable $e ) {
            $retorno = [ 'type' => 'ERROR', 'mensagem' => 'Não foi possível realizar a sua solicitação!', $e->getMessage() ];
            return response()->json($retorno, Response::HTTP_BAD_REQUEST);
        } catch (Exception  $e ) {
            $retorno = [ 'type' => 'ERROR', 'mensagem' => 'Não foi possível realizar a sua solicitação!', $e->getMessage() ];
            return response()->json($retorno, Response::HTTP_BAD_REQUEST);
        }

    }
}
