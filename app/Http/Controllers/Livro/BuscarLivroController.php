<?php

namespace App\Http\Controllers\Livro;

use App\Http\Controllers\Controller;
use App\Services\LivroService;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class BuscarLivroController extends Controller
{

    public function __construct(LivroService $service){
        $this->service = $service;
    }

    public function __invoke(int $id): JsonResponse {

        try {
            
            $result = $this->service->buscarPorId($id);
            $result->assuntos;
            $result->autores;

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
