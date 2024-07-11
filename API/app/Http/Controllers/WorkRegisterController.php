<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PromoterRouterController;
use App\Models\WorkRegister;

class WorkRegisterController extends Controller
{
    public function index()
    {
        $WorkRegister = WorkRegister::all();
        return response()->json($WorkRegister);
    }

}
