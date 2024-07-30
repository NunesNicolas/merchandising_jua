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
      Route::get('user', [AuthController::class, 'user']);
    });
});


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('produtos', ProdutosController::class);

Route::resource('promotores', PromotoresController::class);

Route::resource('competitors', CompetitorsController::class);

Route::resource('clientes', ClientesController::class);

Route::resource('pesquisas', PromoterRouterController::class);
Route::get('pesquisas/promotor/{promotor_id}', [PromoterRouterController::class, 'opened']);
Route::get('pesquisas/finals/{promotor_id}', [PromoterRouterController::class, 'finals']);

Route::resource('workreg', WorkRegisterController::class);
Route::get('workreg/pesquisa/{routeId}', [WorkRegisterController::class, 'showByRoute']);
