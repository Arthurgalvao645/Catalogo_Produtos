<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
{
    /**
     * Determina se o usuário está autorizado a fazer esta requisição.
     * Por enquanto, deixe como 'true' para testarmos.
     * Na Fase 7 (Autenticação), integraremos isso com o Sanctum.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Define as regras de validação.
     */
    public function rules(): array
    {
        return [
            'nome'      => 'required|string|max:255|min:3',
            'descricao' => 'required|string|min:10',
            'preco'     => 'required|numeric|min:0.01',
            // A imagem é obrigatória na criação, mas opcional na edição
            'imagem'    => $this->isMethod('post')
                ? 'required|image|mimes:jpeg,png,jpg|max:2048'
                : 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    /**
     * Customiza as mensagens de erro (Opcional, mas melhora a UX do learnTECH)
     */
    public function messages(): array
    {
        return [
            'nome.required'      => 'O nome do produto é obrigatório.',
            'preco.numeric'      => 'O preço deve ser um valor numérico.',
            'imagem.image'       => 'O arquivo enviado deve ser uma imagem válida.',
            'imagem.max'         => 'A imagem não pode ser maior que 2MB.',
        ];
    }
}
