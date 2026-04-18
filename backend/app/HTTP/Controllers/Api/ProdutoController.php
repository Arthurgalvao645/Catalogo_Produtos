<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    public function index()
    {
        return Produto::orderBy('created_at', 'desc')->get();
    }

    public function store(Request $request)
    {
        // Validação simples direto no controller para não travar o cadastro
        $request->validate([
            'nome' => 'required|string',
            'preco' => 'required',
            'descricao' => 'required',
            'imagem' => 'nullable|image'
        ]);

        $dados = $request->all();

        if ($request->hasFile('imagem')) {
            $dados['imagem'] = $request->file('imagem')->store('produtos', 'public');
        }

        $produto = Produto::create($dados);
        return response()->json($produto, 201);
    }

    public function show($id)
    {
        return Produto::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);
        $dados = $request->all();

        if ($request->hasFile('imagem')) {
            if ($produto->imagem) {
                Storage::disk('public')->delete($produto->imagem);
            }
            $dados['imagem'] = $request->file('imagem')->store('produtos', 'public');
        }

        $produto->update($dados);
        return response()->json($produto);
    }

    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        if ($produto->imagem) {
            Storage::disk('public')->delete($produto->imagem);
        }
        $produto->delete();
        return response()->json(['message' => 'Excluído']);
    }
}
