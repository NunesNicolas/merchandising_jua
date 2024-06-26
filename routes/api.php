<?php

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


Route::prefix('produtos')->group (function(){
Route::get('/', [ProdutosController::class , 'home'])->name('Produtos-home');
Route::get('/{id?}', [ProdutosController::class , 'info'])->name('Produtos-info');
Route::post('save_produto', [ProdutosController:: class, 'saveProduto']);
Route::put('/{id}', [ProdutosController::class , 'update'])->where('id', '[0-9]+');
}); 

Route::prefix('competitors')->group (function(){
    Route::get('/create', [ProdutosController::class , 'create_competitors'])->name('Competitors-create');
    Route::post('/', [ProdutosController::class , 'store_competitors'])->name('Competitors-store');  
});

Route::prefix('promotores')->group(function(){
    Route::get('/', [PromotoresController::class , 'home'])->name('Promotores-home');
    Route::get('/create', [PromotoresController::class , 'create'])->name('Promotores-create');
    Route::post('/', [PromotoresController::class , 'store'])->name('Promotores-store');
    Route::get('/{id?}', [PromotoresController::class , 'info'])->name('Promotores-info');
    Route::post('save_promotor', [PromotoresController:: class, 'savePromotor']);
});

Route::prefix('empresas')->group(function(){
    Route::get('/', [EmpresasController::class , 'index'])->name('Empresas-index');
    Route::post('/', [EmpresasController::class , 'store'])->name('Empresas-store');
    Route::get('/{id}', [EmpresasController::class , 'info'])->where('id','[0-9]')->name('Empresa-info');
    Route::put('/{id}', [EmpresasController::class , 'update'])->where('id','[0-9]')->name('Empresas-update');
    Route::delete('/{id}', [EmpresasController::class, 'destroy'])-> where('id', '[0-9]') -> name('Empresas-destroy');
    Route::post('save_empresa', [EmpresasController::class, 'saveEmpresa']);
});



