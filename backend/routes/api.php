<?php

use App\Http\Controllers\Api\ProdutoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes - learnTECH Ecosystem
|--------------------------------------------------------------------------
*/

/**
 * Usando apiResource, o Laravel cria automaticamente:
 * GET    /api/produtos          -> index   (Lista todos)
 * POST   /api/produtos          -> store   (Cria novo)
 * GET    /api/produtos/{id}     -> show    (Busca um para editar)
 * PUT    /api/produtos/{id}     -> update  (Salva edição)
 * DELETE /api/produtos/{id}     -> destroy (Exclui)
 */
Route::apiResource('produtos', ProdutoController::class);

// Caso precise de rotas customizadas no futuro, adicione abaixo do resource.
