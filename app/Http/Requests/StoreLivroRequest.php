<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLivroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
                'titulo' => 'required|max:40',
                'editora' => 'required|max:40',
                'edicao' => 'required',
                'valor' => 'required',
                'assunto' => 'required',
                'autor' => 'required',
        ];
    }

    public function messages(){
        return [
            'titulo.required' => 'Campo titulo é obrigatório',
            'titulo.max' => 'Campo titulo não pode ultrapassar de 40 caracteres',
            'editora.required' => 'Campo editora é obrigatório',
            'editora.max' => 'Campo editora não pode ultrapassar de 40 caracteres',
            'edicao.required' => 'Campo editora é obrigatório',
            'anoPublicacao.required' => 'Campo ano de publicação é obrigatório',
            'anoPublicacao.max' => 'Campo ano de publicação não pode ultrapassar de 4 caracteres',
            'valor.required' => 'Campo valor é obrigatório',
            'assunto.required' => 'Campo assunto é obrigatório',
            'autor.required' => 'Campo autor é obrigatório',
        ];
    }
}
