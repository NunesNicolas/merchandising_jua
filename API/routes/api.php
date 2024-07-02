<?php

use App\Http\Controllers\ClientesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\PromotoresController;
use App\Http\Controllers\EmpresasController;

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// Route::prefix('produtos')->group(function () {
//     Route::get('/', [ProdutosController::class, 'home'])->name('Produtos-home');
//     Route::get('/{id?}', [ProdutosController::class, 'info'])->name('Produtos-info');
//     Route::post('save_produto', [ProdutosController::class, 'saveProduto']);
//     Route::put('/{id?}', [ProdutosController::class, 'update'])->where('id', '[0-9]+');
// });

Route::resource('produtos', ProdutosController::class);

Route::resource('promotores', PromotoresController::class);

Route::prefix('competitors')->group(function () {
    Route::get('/create', [ProdutosController::class, 'create_competitors'])->name('Competitors-create');
    Route::post('/', [ProdutosController::class, 'store_competitors'])->name('Competitors-store');
});


Route::prefix('empresas')->group(function () {
    Route::get('/', [EmpresasController::class, 'index'])->name('Empresas-index');
    Route::post('/', [EmpresasController::class, 'store'])->name('Empresas-store');
    Route::get('/{id}', [EmpresasController::class, 'info'])->where('id', '[0-9]')->name('Empresa-info');
    Route::put('/{id}', [EmpresasController::class, 'update'])->where('id', '[0-9]')->name('Empresas-update');
    Route::delete('/{id}', [EmpresasController::class, 'destroy'])->where('id', '[0-9]')->name('Empresas-destroy');
    Route::post('save_empresa', [EmpresasController::class, 'saveEmpresa']);
});


Route::resource('clientes', ClientesController::class);
