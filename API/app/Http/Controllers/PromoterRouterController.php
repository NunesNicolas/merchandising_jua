<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\promotor_router;
use App\Models\Promotores;
use App\Models\Cliente;


class PromoterRouterController extends Controller
{
    public function index()
    {
        $PromoterRouter = promotor_router::all();
        return response()->json($PromoterRouter);
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
