<?php

use App\Http\Controllers\PromotorController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProdutoController;
<<<<<<< HEAD
use App\Http\Controllers\EmpresaController;
=======
use App\Http\Controllers\ProdutosController;
>>>>>>> 777a5468fd78a867588e2a137e0351a6e9188fc6
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

route::prefix('forms')->group(function(){
Route::get('/', [PromotorController::class , 'promo'])->name('Promotor-forms');


<<<<<<< HEAD
Route::get('/produtos', [ProdutoController::class , 'produtos'])->name('Produtos-forms');
Route::post('/empresas', [EmpresaController::class , 'empresas'])->name('Empresas-forms');
=======
>>>>>>> 777a5468fd78a867588e2a137e0351a6e9188fc6
} );

route::prefix('produtos')->group (function(){
    Route::get('/', [ProdutosController::class , 'index'])->name('Produtos-index');
    Route::get('/create', [ProdutosController::class , 'create'])->name('Produtos-create');
    Route::post('/', [ProdutosController::class , 'store'])->name('Produtos-store');
});
