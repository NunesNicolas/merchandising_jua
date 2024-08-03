<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\competitor_survey;

class competitor_surveyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function store(Request $request)
    {
        
        $competitor_survey = competitor_survey::create($request->all());
        return response()->json($competitor_survey, 201);

    }

    public function showByRoute($routeId)
    {
        $competitor_survey = competitor_survey::where('promotor_route_id', $routeId)->get();
        return response()->json($competitor_survey);
    }

    }
