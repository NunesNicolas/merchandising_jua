<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::prefix('produtos')->group (function(){
        Route::get('/', [ProdutosController::class , 'index'])->name('Produtos-index');
        Route::get('/create', [ProdutosController::class , 'create'])->name('Produtos-create');
        Route::post('/', [ProdutosController::class , 'store'])->name('Produtos-store');
        Route::get('/{id?}', [ProdutosController::class , 'info'])->name('Produtos-info');
        Route::get('/{id}/edit', [ProdutosController::class , 'edit'])->where('id','[0-9]+')->name('Produtos-edit');
        Route::put('/{id}', [ProdutosController::class , 'update'])->where('id','[0-9]+')->name('Produtos-update'); 
        Route::delete('/{id}', [ProdutosController::class , 'destroy'])->where('id','[0-9]+')->name('Produtos-destroy');
        //----------------------------------------------------------------------------------------
        
});

