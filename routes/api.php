<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\PromotoresController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('produtos')->group (function(){
Route::get('/', [ProdutosController::class , 'home'])->name('Produtos-home');
Route::get('/{id?}', [ProdutosController::class , 'info'])->name('Produtos-info');
Route::post('save_produto', [\App\Http\Controllers\ProdutosController:: class, 'saveProduto']);
}); 

Route::prefix('promotores')->group(function(){
    Route::get('/', [PromotoresController::class , 'home'])->name('Promotores-home');
    Route::get('/create', [PromotoresController::class , 'create'])->name('Promotores-create');
    Route::post('/', [PromotoresController::class , 'store'])->name('Promotores-store');
    Route::get('/{id?}', [PromotoresController::class , 'info'])->name('Promotores-info');
});



