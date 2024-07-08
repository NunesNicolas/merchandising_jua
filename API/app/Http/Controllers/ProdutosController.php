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

        $produtos = Produto::select('nome', 'id', 'img')
            ->whereIn('id', function ($query) {
                $query->select(Produto::raw('MIN(id)'))
                    ->from('produtos')
                    ->groupBy('nome');
            })
            ->get();

        return response()->json($produtos);
    }

    public function show($id)
    {

        $produto = Produto::find($id);

        $produtovariants = Produto::where('nome', $produto->nome)->get();

        $id_jua = $id; // ID do produto desejado
        $competitorsthis = Competitor::where('product_id', $id_jua)->get();

        if ($produto) {
            // O promotor foi encontrado, faça algo com as informações
            return response()->json([
                'produto' => $produto,
                'produtovariants' => $produtovariants,
                'competitorsthis' => $competitorsthis
            ]);
        } else {
            // O promotor não foi encontrado, trate o erro
            abort(404);
        }
    }

    public function store(Request $request)
    {

        $weights = $request->input('weights');

        if (is_array($weights)) {
            foreach ($weights as $weight) {
                $produto = new Produto();
                $produto->nome = $request->input('nome');
                $produto->img = $request->input('img');

                // Defina o peso (weight) para o valor atual do loop
                $produto->weight = $weight;

                $existingProduct = Produto::where('nome', $produto->nome)
                    ->where('weight', $produto->weight)
                    ->first();
                if (!$existingProduct) {
                    $produto->save();
                }
            }
        } else {
            return response()->json([
                'message' => 'Peso não registrado',
                'code' => 400
            ]);
        }
        // $produto = Produto::create($request->all());
        return response()->json($produto, 201);
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::find($id);
        $produto->update($request->all());
        return response()->json($produto);
    }
    public function destroy($id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        return response()->json(null, 204);
    }
}
