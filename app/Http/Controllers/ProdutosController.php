<?php

namespace App\Http\Controllers;

use App\Models\Competitor;
use App\Models\Produto;
use Illuminate\Http\Request;
use  App\Requests\ProdutoStore;

class ProdutosController extends Controller
{
    public function index()
    {
        // $produtos = Produto::all();

        // $produtos = Produto::select('nome', 'id', 'img')
        // ->distinct()
        // ->orderBy('nome')
        // ->groupBy('nome')
        // ->get();

        $produtos = Produto::select('nome', 'id', 'img')
                ->whereIn('id', function ($query) {
                    $query->select(Produto::raw('MIN(id)'))
                          ->from('produtos')
                          ->groupBy('nome');
                })
                ->get();

        // $produtos = Produto::select('nome','id','img')->distinct()->get();
        
        return view('produtos.homeprodutos', ['produtos'=>$produtos]);
    }
    public function create()
    {
        return view('produtos.criarprodutos');
    }
    
    public function info ($id){

        $produto = Produto::find($id);

        $id_jua = $id; // ID do produto desejado
        $competitorsthis = Competitor::where('product_id', $id_jua)->get();

        if ($produto) {
            // O promotor foi encontrado, faça algo com as informações
            return view("produtos.produtoinfo", ['produto'=>$produto, 'competitorsthis'=>$competitorsthis]);
        } else {
            // O promotor não foi encontrado, trate o erro
            abort(404);
        }
    }

    public function create_competitors()
    {
        
        $produtos = Produto::all();

        return view('produtos.adicionarcompetitors',['produtos'=>$produtos]);
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

    // COMPETITORS ROUTES :c


    public function store_competitors (Request $request)
    {
        Competitor::create($request->all());
        return redirect()->route('Produtos-index');
    }

    // FALTA COISA 


}
