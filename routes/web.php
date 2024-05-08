<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\HomesController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\TestesController;
use App\Http\Controllers\PromotorsController;
use App\Http\Controllers\PromotoresController;
use App\Models\Empresa;
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
Route::prefix('promotores')->group(function(){
    Route::get('/', [PromotoresController::class , 'home'])->name('Promotores-home');
    Route::get('/create', [PromotoresController::class , 'create'])->name('Promotores-create');
    Route::post('/', [PromotoresController::class , 'store'])->name('Promotores-store');
    Route::get('/{id?}', [PromotoresController::class , 'info'])->name('Promotores-info');

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

Route::prefix('competitors')->group (function(){
        Route::get('/create', [ProdutosController::class , 'create_competitors'])->name('Competitors-create');
        Route::post('/', [ProdutosController::class , 'store_competitors'])->name('Competitors-store');  
});

// route::prefix('crud')->group(function(){
// Route::get('/', [UsuarioController::class , 'home'])->name('Usuario-home');
// Route::get('/create', [UsuarioController::class , 'create'])->name('Usuario-create');
// Route::post('/', [UsuarioController::class , 'store'])->name('Usuario-store');
// Route::get('/{id}/edit', [UsuarioController::class , 'edit'])->where('id','[0-9]')->name('Usuario-edit');
// Route::put('/{id}', [UsuarioController::class , 'update'])->where('id','[0-9]')->name('Usuario-update');
// Route::delete('/{id}', [UsuarioController::class , 'destroy'])->where('id','[0-9]')->name('Usuario-destroy');
// } ); 

Route::prefix('empresa')->group(function(){
    Route::get('/', [EmpresasController::class , 'index'])->name('Empresas-index');
    Route::get('/create', [EmpresasController::class , 'create'])->name('Empresas-create');
    Route::post('/', [EmpresasController::class , 'store'])->name('Empresas-store');
    Route::get('/{id}', [EmpresasController::class , 'info'])->where('id','[0-9]')->name('Empresa-info');
    Route::put('/{id}', [EmpresasController::class , 'update'])->where('id','[0-9]')->name('Empresas-update');
    Route::delete('/{id}', [EmpresasController::class, 'destroy'])-> where('id', '[0-9]') -> name('Empresas-destroy');
});

Route::prefix('forms')->group(function(){
    Route::get('/', [FormsController::class , 'index'])->name('Forms-index');

});

Route::prefix('testes')->group (function(){
   
});