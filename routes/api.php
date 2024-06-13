<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\PromotoresController;
use App\Http\Controllers\UserController;

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


//     Route::get('/create', [ProdutosController::class , 'create'])->name('Produtos-create');
//     Route::post('/', [ProdutosController::class , 'store'])->name('Produtos-store');
//     Route::get('/{id?}', [ProdutosController::class , 'info'])->name('Produtos-info');
//     Route::get('/{id}/edit', [ProdutosController::class , 'edit'])->where('id','[0-9]+')->name('Produtos-edit');
//     Route::put('/{id}', [ProdutosController::class , 'update'])->where('id','[0-9]+')->name('Produtos-update');
//     Route::delete('/{id}', [ProdutosController::class , 'destroy'])->where('id','[0-9]+')->name('Produtos-destroy');
//     //----------------------------------------------------------------------------------------

Route::get('/', [UserController::class , 'initial'])->name('inicial');
Route::get('/dashboard', [UserController::class , 'dashboard'])->name('dashboard');


Route::post('/login', [UserController::class , 'login'])->name('login-store');
Route::get('/logout', [UserController::class , 'logout'])->name('login-logout');


Route::prefix('produtos')->group (function(){
Route::get('/', [ProdutosController::class , 'home'])->name('Produtos-home');
Route::get('/{id?}', [ProdutosController::class , 'info'])->name('Produtos-info');
}); 

Route::prefix('promotores')->group(function(){
    Route::get('/', [PromotoresController::class , 'home'])->name('Promotores-home');
    Route::get('/create', [PromotoresController::class , 'create'])->name('Promotores-create');
    Route::post('/', [PromotoresController::class , 'store'])->name('Promotores-store');
    Route::get('/{id?}', [PromotoresController::class , 'info'])->name('Promotores-info');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
