<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return response()->json(['data' => $clientes]);
    }

    public function store(Request $request)
    {
        $cliente = Cliente::create($request->all());
        return response()->json(['data' => $cliente], 201);
    }

    public function show(Cliente $cliente)
    {
        return response()->json($cliente);
    }

    public function update(Request $request, Cliente $cliente)
    {
        $cliente->update($request->all());
        return response()->json(['data' => $cliente]);
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return response()->json(null, 204);
    }
}
