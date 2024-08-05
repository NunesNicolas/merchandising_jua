<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\competitor_survey;
use App\Models\promotor_router;

class competitor_surveyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function showByCliente(int $cliente_id)
    {
        $latestPromotorRoute = promotor_router::where('cliente_id', $cliente_id)
            ->latest()
            ->first();

        if (!$latestPromotorRoute) {
            // Handle the case where no promotor route is found
            return response()->json(['error' => 'No promotor route found'], 404);
        }

        $latestPromotorRoute->competitorsSurveys;

        return response()->json($latestPromotorRoute->competitorsSurveys);
    }

    public function store(Request $request)
    {
        
        $competitorsSurveys = [];
        foreach ($request->all() as $surveyData) {
            $competitorsSurvey = competitor_survey::create($surveyData);
            $competitorsSurveys[] = $competitorsSurvey;
        }
        return response()->json($competitorsSurveys, 201);

    }

    public function showByRoute($routeId)
    {
        $competitor_survey = competitor_survey::where('promotor_route_id', $routeId)->get();
        return response()->json($competitor_survey);
    }

    }
