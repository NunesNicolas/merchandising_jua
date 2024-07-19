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
        $promoterRouters = promotor_router::where('promotor_id', $promotor_id)->get();

        foreach ($promoterRouters as $promoterRouter) {
            $promoterRouter->promotor = Promotores::find($promoterRouter->promotor_id);
            $promoterRouter->cliente = Cliente::find($promoterRouter->cliente_id);
        }
        if ($promoterRouters->isEmpty()) {
            return response()->json(['message' => 'PromoterRouter not found'], 404);
        }

        return response()->json($promoterRouters);
    }

}
