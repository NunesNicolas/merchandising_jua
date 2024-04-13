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
        return redirect()->route('Forms-index');
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
            'nomeproduto' => $request->nomeproduto,
            'precoproduto' => $request->precoproduto,
            'marcaproduto' => $request->marcaproduto,
            'tipoproduto' => $request->tipoproduto,
            'numerovendas' => $request->numerovendas,

        ];
        Produto::where('id', $id)->update($data);
        return redirect()->route('Forms-index');
    }
    public function destroy($id)
    {
        Produto::where('id', $id)->delete();
        return redirect()->route('Forms-index');
    }
}
