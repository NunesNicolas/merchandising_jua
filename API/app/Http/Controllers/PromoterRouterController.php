<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PromoterRouter;


class PromoterRouterController extends Controller
{
    public function index()
    {
        $PromoterRouter = PromoterRouter::all();
        return response()->json($PromoterRouter);
    }

}
