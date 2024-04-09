<?php

use App\Http\Controllers\PromotorController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProdutosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
route::prefix('crud')->group(function(){
Route::get('/', [UsuarioController::class , 'home'])->name('Usuario-home');
Route::get('/create', [UsuarioController::class , 'create'])->name('Usuario-create');
Route::post('/', [UsuarioController::class , 'store'])->name('Usuario-store');
Route::get('/{id}/edit', [UsuarioController::class , 'edit'])->where('id','[0-9]')->name('Usuario-edit');
Route::put('/{id}', [UsuarioController::class , 'update'])->where('id','[0-9]')->name('Usuario-update');
Route::delete('/{id}', [UsuarioController::class , 'destroy'])->where('id','[0-9]')->name('Usuario-destroy');
} ); 

route::prefix('promotores')->group(function(){
Route::get('/', [PromotorController::class , 'promo'])->name('Promotor-forms');
Route::post('/', [PromotorController::class , 'store'])->name('Promotor-store');
} );

route::prefix('produtos')->group (function(){
    Route::get('/', [ProdutosController::class , 'index'])->name('Produtos-index');
    Route::get('/create', [ProdutosController::class , 'create'])->name('Produtos-create');
    Route::post('/', [ProdutosController::class , 'store'])->name('Produtos-store');
});
