<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', ['produtos'=>$produtos]);
    }
    public function create()
    {
        return view('produtos.createprodutos');
    }
    public function store(Request $request)
    {
        Produto::create($request->all());
        return redirect()->route('Produtos-index');
    }
}
