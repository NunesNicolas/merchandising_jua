<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\promotor_router;
use App\Models\Promotores;
use App\Models\Cliente;
use  App\Models\product_survey;
use  App\Models\promotor_work_register;
use App\Http\Controllers\product_surveyController;

class PromoterRouterController extends Controller
{
    public function index()
    {
        $promotor_routers = promotor_router::all();
        return response()->json($promotor_routers);
    }

    public function show($id)
    {
        $PromoterRouter = promotor_router::find($id);
        $PromoterRouter->promotor = Promotores::find($PromoterRouter->promotor_id);
        $PromoterRouter->cliente = Cliente::find($PromoterRouter->cliente_id);
        $PromoterRouter->haveReg = promotor_work_register::where('promotor_route_id', $id)->exists();
        return response()->json($PromoterRouter);
    }

    public function showByCliente($cliente_id)
    {
        $PromoterRouters = promotor_router::where('cliente_id', $cliente_id)->get();
        foreach ($PromoterRouters as $PromoterRouter) {
            $PromoterRouter->promotor = Promotores::find($PromoterRouter->promotor_id)->value('nome');
        }
        return response()->json($PromoterRouters);
    }

    public function store(Request $request)
    {
        $PromoterRouter = promotor_router::create($request->all());
        return response()->json($PromoterRouter, 201);
    }

    public function update(Request $request, $id)
    {
        $PromoterRouter = promotor_router::find($id);
        $PromoterRouter->update($request->all());
        return response()->json($PromoterRouter);
    }

    public function opened($promotor_id)
    {
        $promoterRouters = promotor_router::where('promotor_id', $promotor_id)
            ->where('status', '!=', 'concluido') // filter out concluded promoter routers
            ->where('status', '!=', 'CONCLUIDO')
            ->get();

        foreach ($promoterRouters as $promoterRouter) {
            $promoterRouter->promotor = Promotores::find($promoterRouter->promotor_id);
            $promoterRouter->cliente = Cliente::find($promoterRouter->cliente_id);
        }

        if ($promoterRouters->isEmpty()) {
            return response()->json([], 200);
        }

        $sortedPromoterRouters = $promoterRouters->sortByDesc(function ($promoterRouter) {
            return $promoterRouter->checkin_datetime ?: PHP_INT_MAX;
        })
            ->sortBy(function ($promoterRouter) {
                // prioritize those with status "aberto" over those with status "a fazer"
                return $promoterRouter->status === 'ABERTO' ? 0 : 1;
            })->sortBy(function ($promoterRouter) {
                if ($promoterRouter->status == 'ABERTO') {
                    return 0;
                } elseif ($promoterRouter->status == 'A FAZER') {
                    return 1;
                } else {
                    return 2;
                }
            });

        return response()->json($sortedPromoterRouters->values());
    }

    public function finals($promotor_id)
    {
        $promoterRouters = promotor_router::where('promotor_id', $promotor_id)
            ->whereIn('status', ['concluido', 'CONCLUIDO'])
            ->get();

        foreach ($promoterRouters as $promoterRouter) {
            $promoterRouter->cliente = Cliente::find($promoterRouter->cliente_id);
        }

        $sortedPromoterRouters = $promoterRouters->sortByDesc(function ($promoterRouter) {
            return $promoterRouter->checkin_datetime ?: PHP_INT_MAX;
        });
        return response()->json($sortedPromoterRouters->values());
    }

    public function showByRouter($router_id)
    {
        $product_surveys = product_survey::where('router_id', $router_id)->get();
        return $product_surveys;
    }
}
