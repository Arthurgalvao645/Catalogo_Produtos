<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ProdutoResource extends JsonResource
{
    /**
     * Transforma o recurso em um array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id,
            'nome'      => $this->nome,
            'descricao' => $this->descricao,
            'preco'     => (float) $this->preco, // Garante que vá como número, não string

            // O PULO DO GATO: Entrega a URL completa (http://localhost:8000/storage/...)
            'imagem'    => $this->imagem ? asset(Storage::url($this->imagem)) : null,

            'criado_em' => $this->created_at->format('d/m/Y H:i'),
        ];
    }
}
