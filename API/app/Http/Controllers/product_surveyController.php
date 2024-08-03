<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product_survey;

class product_surveyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function store(Request $request)
    {
        
        $product_survey = product_survey::create($request->all());
        return response()->json($product_survey, 201);

    }

    public function showByRoute($routeId)
    {
        $product_survey = product_survey::where('promotor_route_id', $routeId)->get();
        return response()->json($product_survey);
    }

    }
