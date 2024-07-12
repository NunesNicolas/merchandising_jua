<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\PromotoresController;
use App\Http\Controllers\CompetitorsController;
use App\Http\Controllers\PromoterRouterController;
use App\Http\Controllers\WorkRegisterController;
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

Route::resource('produtos', ProdutosController::class);

Route::resource('promotores', PromotoresController::class);

Route::resource('competitors', CompetitorsController::class);

Route::resource('clientes', ClientesController::class);

Route::resource('pesquisas', PromoterRouterController::class);
Route::get('pesquisas/promotor/{promotor_id}', [PromoterRouterController::class, 'showByPromotorId']);

Route::resource('workreg', WorkRegisterController::class);
