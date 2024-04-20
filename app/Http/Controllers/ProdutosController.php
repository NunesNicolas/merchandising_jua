<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use  App\Requests\ProdutoStore;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.homeprodutos', ['produtos'=>$produtos]);
    }
    public function create()
    {
        return view('produtos.criarprodutos');
    }
    public function store(Request $request)
    {
        Produto::create($request->all());
        return redirect()->route('Produtos-index');
    }
    public function edit($id)
    {
        $produtos = Produto::where('id', $id)->first();
        if(!empty($produtos))
        {
            return view('produtos.editprodutos', ['produtos'=>$produtos]);        
        }
        else
        {
            return redirect()->route('Forms-index');
        }
    }
    public function update(Request $request, $id)
    {
        $data = [
            'nome' => $request->nome,
            'img' => $request->email,
            'weight' => $request->weight,  

        ];
        Produto::where('id', $id)->update($data);
        return redirect()->route('Produtos-index');
    }
    public function destroy($id)
    {
        Produto::where('id', $id)->delete();
        return redirect()->route('Forms-index');
    }
}
