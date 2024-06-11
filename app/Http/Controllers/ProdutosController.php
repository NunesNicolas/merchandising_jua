<?php

namespace App\Http\Controllers;

use App\Models\Competitor;
use App\Models\Produto;
use Illuminate\Http\Request;
use  App\Requests\ProdutoStore;

class ProdutosController extends Controller
{
    public function home()
    {

        $produtos = Produto::select('nome', 'id', 'img')
                ->whereIn('id', function ($query) {
                    $query->select(Produto::raw('MIN(id)'))
                          ->from('produtos')
                          ->groupBy('nome');
                })
                ->get();

        return response()->json(['produtos'=>$produtos]);
    }
    public function create()
    {
        return view('produtos.criarprodutos');
    }
    
    public function info ($id){

        $produto = Produto::find($id);

        $produtovariants = Produto::where('nome', $produto->nome)->get();

        $id_jua = $id; // ID do produto desejado
        $competitorsthis = Competitor::where('product_id', $id_jua)->get();

        if ($produto) {
            // O promotor foi encontrado, faça algo com as informações
            return response()->json([
                'produto'=>$produto,
                'produtovariants'=>$produtovariants,
                'competitorsthis'=>$competitorsthis
                ]);
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
        $weights= [];
        if ($request->has('weight500')) {
            // Adicione o peso ao array weights
            $weight = 500;
            $weights[] = $weight; // Exemplo de peso (substitua pelo valor real)
        }
        if ($request->has('weight1000')) {
            // Adicione o peso ao array weights
            $weight = 1000;
            $weights[] = $weight; // Exemplo de peso (substitua pelo valor real)
            }
        if ($request->has('weight5000')) {
            // Adicione o peso ao array weights
            $weight = 5000;
            $weights[] = $weight; // Exemplo de peso (substitua pelo valor real)
            }


        for ($i = 0; $i < count($weights); $i++) {
            $weight = $weights[$i];
            # code...
        $produto = new Produto($request->all());
        
        // Defina o peso (weight) para o valor atual do loop
        $produto->weight = $weight;
        
        // Salve o produto no banco de dados
        $produto->save();
        }
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
