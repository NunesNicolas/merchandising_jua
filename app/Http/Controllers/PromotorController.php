<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PromotorController extends Controller
{
    public function promo(){
        return view('forms.promotor');
        }
}
