<?php

namespace App\Http\Controllers\Livro;

use App\Http\Controllers\Controller;
use App\Services\LivroService;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;
use Illuminate\Http\Request;

class ExcluirLivroController extends Controller
{

    public function __construct(LivroService $service){
        $this->service = $service;
    }

    public function __invoke(Request $request): JsonResponse {

        try {
            if($request->id) {
                $result = $this->service->excluir($request->id);

                if($result){
                    return response()->json(['type' => 'SUCESSO', 'mensagem' => 'Registro deletado com sucesso!'], Response::HTTP_OK);
                }
            }
            $retorno = [ 'type' => 'ERROR', 'mensagem' => 'Não foi possível realizar a sua solicitação!' ];
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
