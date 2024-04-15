<?php

namespace App\Http\Controllers;

use App\Models\Teste;
use Illuminate\Http\Request;

class TestesController extends Controller
{
    public function index (){
        $testes = Teste::all();
        return view("promotores.promotorinfo", ['testes'=>$testes]);

    } 
}
