<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competitor;

class CompetitorsController extends Controller
{
    public function show($id)
    {
        $competitor = Competitor::find($id);

            if ($competitor) {
                // O promotor foi encontrado, faça algo com as informações
                return response()->json(['competitor'=>$competitor]);
            } else {
                // O promotor não foi encontrado, trate o erro
                abort(404);
            }
    }

    public function store(Request $request)
    {
        
        $competitor = Competitor::create($request->all());
        return response()->json($competitor, 201);

    }

    public function update(Request $request, $id)
    {
        $competitor = Competitor::find($id);
        $competitor->update($request->all());
        return response()->json($competitor, 200);
    }
    
}
