<?php

namespace App\Http\Controllers\Autor;

use App\Http\Controllers\Controller;
use App\Services\AutorService;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class BuscarAutorController extends Controller
{

    protected AutorService $service;

    public function __construct(AutorService $service){
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
