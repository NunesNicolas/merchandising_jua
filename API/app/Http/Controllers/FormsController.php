<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Produto;
use App\Models\Promotor;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function index()
    {
    $produtos = Produto::all();
    $empresa = Empresa::all();
    $promotor = Promotor::all();

    // print_r($promotor);die;
    return view('forms.home', [
        'produtos'=>$produtos, 
        'empresas' => $empresa,
        'promotors'=>$promotor,
    ]);
    }
}

