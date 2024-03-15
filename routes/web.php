<?php

use App\Http\Controllers\UsuarioController;
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
} ); 
