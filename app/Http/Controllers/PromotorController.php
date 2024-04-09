<?php

namespace App\Http\Controllers;

use App\Models\promotor;
use App\Models\promotore;
use Illuminate\Http\Request;

class PromotorController extends Controller
{
    public function promo(){
        return view('promotores.criarpromotor');
        }
        public function store(Request $request)
    {
        Promotore::create($request->all());
        return redirect()->route('homepromotor');
    }
}
