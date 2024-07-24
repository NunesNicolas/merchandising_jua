<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\promotor_router;
use App\Models\Promotores;
use App\Models\Cliente;


class PromoterRouterController extends Controller
{
    public function show($id)
    {
        $PromoterRouter = promotor_router::find($id);
        $PromoterRouter->promotor = Promotores::find($PromoterRouter->promotor_id);
        $PromoterRouter->cliente = Cliente::find($PromoterRouter->cliente_id);
        return response()->json($PromoterRouter);
    }

    public function store(Request $request)
    {
        $PromoterRouter = promotor_router::create($request->all());
        return response()->json($PromoterRouter, 201);
    }

    public function showByPromotorId($promotor_id)
    {
        $promoterRouters = promotor_router::where('promotor_id', $promotor_id)
            ->where('status', '!=', 'CONCLUIDO')
            ->get();

        foreach ($promoterRouters as $promoterRouter) {
            $promoterRouter->promotor = Promotores::find($promoterRouter->promotor_id);
            $promoterRouter->cliente = Cliente::find($promoterRouter->cliente_id);
        }

        if ($promoterRouters->isEmpty()) {
            return response()->json(['message' => 'PromoterRouter not found'], 404);
        }

        $sortedPromoterRouters = $promoterRouters->sortByDesc(function ($promoterRouter) {
            return $promoterRouter->checkin_datetime ?: PHP_INT_MAX;
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

    public function update(Request $request, $id)
    {
        $PromoterRouter = promotor_router::find($id);
        $PromoterRouter->update($request->all());
        return response()->json($PromoterRouter);
    }
}
