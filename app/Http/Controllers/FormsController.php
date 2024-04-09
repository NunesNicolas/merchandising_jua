<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Produto;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function index()
    {
    $produtos = Produto::all();
    $empresa = Empresa::all();
    return view('forms.home', ['produtos'=>$produtos], ['empresas' => $empresa]);
    }
}

