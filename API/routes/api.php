<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\PromotoresController;
use App\Http\Controllers\CompetitorsController;
use App\Http\Controllers\PromoterRouterController;
use App\Http\Controllers\WorkRegisterController;
use App\Http\Controllers\product_surveyController;
use App\Http\Controllers\competitor_surveyController;
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


Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [ApiAuthController::class, 'login']);

    Route::group(['middleware' => 'auth:sanctum'], function() {
      Route::get('logout', [ApiAuthController::class, 'logout']);
      Route::get('user', [ApiAuthController::class, 'user']);
    });
});


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('produtos', ProdutosController::class);
Route::get('all/produtos', [ProdutosController::class, 'indexAll']);

Route::resource('promotores', PromotoresController::class);

Route::resource('competitors', CompetitorsController::class);
Route::get('all/competitors', [CompetitorsController::class, 'indexAll']);

Route::resource('clientes', ClientesController::class);

Route::resource('pesquisas', PromoterRouterController::class);
Route::get('pesquisas/promotor/{promotor_id}', [PromoterRouterController::class, 'opened']);
Route::get('pesquisas/finals/{promotor_id}', [PromoterRouterController::class, 'finals']);


Route::resource('workreg', WorkRegisterController::class);
Route::get('workreg/pesquisa/{routeId}', [WorkRegisterController::class, 'showByRoute']);

Route::resource('product_survey', product_surveyController::class);
Route::get('product_survey/pesquisa/{routeId}', [product_surveyController::class, 'showByRoute']);
Route::get('product_survey/cliente_products/{cliente_id}', [product_surveyController::class, 'showByCliente']);

Route::resource('competitor_survey', competitor_surveyController::class);
Route::get('competitor_survey/pesquisa/{routeId}', [competitor_surveyController::class, 'showByRoute']);

