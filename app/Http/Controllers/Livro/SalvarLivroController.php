<?php

namespace App\Http\Controllers\Livro;

use App\Http\Controllers\Controller;
use App\Services\LivroAssuntoService;
use App\Services\LivroAutorService;
use App\Services\LivroService;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use PDOException;

class SalvarLivroController extends Controller
{

    protected LivroService $service;
    protected LivroAutorService $livroAutorService;
    protected LivroAssuntoService $livroAssuntoService;

    public function __construct(LivroService $service, LivroAutorService $livroAutorService, LivroAssuntoService $livroAssuntoService){
        $this->service = $service;
        $this->livroAutorService = $livroAutorService;
        $this->livroAssuntoService = $livroAssuntoService;
    }

   
    public function __invoke(Request $request): JsonResponse {

        try {

            $rules = [
                'titulo' => 'required|max:40',
                'editora' => 'required|max:40',
                'edicao' => 'required',
                'anoPublicacao' => 'required|max:4',
                'valor' => 'required',
                'assunto' => 'required',
                'autor' => 'required',
            ];

            $messages = [
                'titulo.required' => 'Campo titulo é o obrigatório',
                'titulo.max' => 'Campo titulo não pode ultrapassar de 40 caracteres',
                'editora.required' => 'Campo editora é o obrigatório',
                'editora.max' => 'Campo editora não pode ultrapassar de 40 caracteres',
                'edicao.required' => 'Campo editora é o obrigatório',
                'anoPublicacao.required' => 'Campo ano de publicação é o obrigatório',
                'anoPublicacao.max' => 'Campo ano de publicação não pode ultrapassar de 4 caracteres',
                'valor.required' => 'Campo valor é o obrigatório',
                'assunto.required' => 'Campo assunto é o obrigatório',
                'autor.required' => 'Campo autor é o obrigatório',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {

                $errors = $validator->errors();

                $retorno = [
                            'type' => 'ERROR',
                            'mensagem' => $errors->all()[0],
                            ];
                return response()->json($retorno, Response::HTTP_BAD_REQUEST);
            }

            $total = $this->service->verificaLivroExiste($request);

            if($total > 0){
                $retorno = ['type' => 'WARNING', 'mensagem' => 'Este registro já existe!'];
                return response()->json($retorno, Response::HTTP_OK);
            }

            $acao = ['cadastrado', 'cadastrar'];
            if($request->id){
                $acao = ['alterado', 'alterar'];
            }

            $resultado = $this->service->salvar($request);
            $this->livroAssuntoService->salvarAssunto($request, $resultado->id);
            $this->livroAutorService->salvarAutor($request, $resultado->id);
            
            if($resultado === null){
                $retorno = ['type' => 'ERROR', 'mensagem' => 'Não foi possível '.$acao[1].' o dado!'];
                return response()->json($retorno, Response::HTTP_BAD_REQUEST);
            } else {
                $retorno = ['type' => 'SUCESSO', 'mensagem' => 'Registro '.$acao[0].' com sucesso!'];
                return response()->json($retorno, Response::HTTP_OK);
            }

        } catch (QueryException $e ) {
            $retorno = [ 'type' => 'ERROR', 'mensagem' => 'Não foi possível realizar a sua solicitação!', 'ERRO' => $e->getMessage() ];
            return response()->json($retorno, Response::HTTP_BAD_REQUEST);

        } catch (PDOException $e ) {
            $retorno = [ 'type' => 'ERROR', 'mensagem' => 'Não foi possível realizar a sua solicitação!', 'ERRO' => $e->getMessage(), 'get_class' => get_class($e) ];
            return response()->json($retorno, Response::HTTP_BAD_REQUEST);

        }  catch (Exception $e ) {
            $retorno = [ 'type' => 'ERROR', 'mensagem' => 'Não foi possível realizar a sua solicitação!', 'ERRO' => get_class($e) ];
            return response()->json($retorno, Response::HTTP_BAD_REQUEST);

        } 
    }
}
