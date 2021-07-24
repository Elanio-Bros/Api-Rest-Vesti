<?php

use App\Http\Controllers\ProdutosControlle;
use App\Http\Controllers\UsarioController;
use App\Http\Controllers\UsuarioController;
use App\Models\Produtos;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('checkToken')->group(function () {
    Route::get('/usuarios', [UsuarioController::class, 'getAllUsuarios']);
    Route::middleware('is_admin')->group(function () {
        Route::delete('/deleteUsuario', [UsuarioController::class, 'deleteUsuarioEmail']);
        Route::delete('/deleteUsuario/{id}', [UsuarioController::class, 'deleteUsuarioId']);
        Route::put('/usario/{idUser}', [UsuarioController::class, 'updatePutUser']);
        Route::patch('/usario/{idUser}', [UsuarioController::class, 'updatePatchUser']);
    });
    //  Route::post('/imagem',[ProdutosControlle::class,'UploadImagens']);
    Route::middleware('is_modified')->group(function () {
        Route::post('/Createproduto', [ProdutosControlle::class, 'createProduto']);
        Route::put('/UpdateFotos/{idProduto}', [ProdutosControlle::class, 'createProduto']);
    });
});
Route::get('/usuarioToken', [UsuarioController::class, 'getUsuarioToken']);
Route::post('/criarUsuario', [UsuarioController::class, 'postCreateUsuario']);
