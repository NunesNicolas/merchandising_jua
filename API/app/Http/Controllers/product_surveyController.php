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
    $productSurveys = [];
    foreach ($request->all() as $surveyData) {
        $productSurvey = product_survey::create($surveyData);
        $productSurveys[] = $productSurvey;
    }
    return response()->json($productSurveys, 201);
}

    public function showByRoute($routeId)
    {
        $product_survey = product_survey::where('promotor_route_id', $routeId)->get();
        return response()->json($product_survey);
    }

    }
