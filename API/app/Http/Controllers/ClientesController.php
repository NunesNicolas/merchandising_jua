<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\promotor_router;
use App\Models\Promotores;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        foreach ($clientes as  $cliente) {
            $latestPromotorRoute = promotor_router::where('cliente_id', $cliente->id)
            ->latest()
            ->first();

            if ($latestPromotorRoute) {
                $promotorId = $latestPromotorRoute->promotor_id;
                $promotor = Promotores::find($promotorId);
                $cliente->promotor = $promotor->nome;
            }
        }
        
        return response()->json($clientes);
    }

    public function store(Request $request)
    {
        $cliente = Cliente::create($request->all());
        return response()->json($cliente, 201);
    }

    public function show(Cliente $cliente)
    {
        return response()->json($cliente);
    }

    public function update(Request $request, Cliente $cliente)
    {
        $cliente->update($request->all());
        return response()->json($cliente);
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return response()->json(null, 204);
    }
}
