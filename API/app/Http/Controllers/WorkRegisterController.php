<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PromoterRouterController;
use App\Models\promotor_work_register;

class WorkRegisterController extends Controller
{
    public function index()
    {
        $workreg = promotor_work_register::all();
        return response()->json($workreg);
    }

    public function store(Request $request)
    {
        $workreg = promotor_work_register::create($request->all());
        return response()->json($workreg, 201);
    }

    public function show(promotor_work_register $workreg)
    {
        return response()->json($workreg);
    }

    public function showByRoute($routeId)
    {
        $workregs = promotor_work_register::where('promotor_route_id', $routeId)->get();
        return response()->json($workregs);
    }
    
    public function update(Request $request, promotor_work_register $workreg)
    {
        $workreg->update($request->all());
        return response()->json($workreg);
    }

    public function destroy(promotor_work_register $workreg)
    {
        $workreg->delete();
        return response()->json(null, 204);
    }
}   
