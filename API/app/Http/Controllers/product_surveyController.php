<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product_survey;
use App\Http\Controllers\PromoterRouterController;

class product_surveyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }


    public function showByRouter($router_id)
    {
        $product_surveys = product_survey::where('router_id', $router_id)->get();
        return $product_surveys;
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
