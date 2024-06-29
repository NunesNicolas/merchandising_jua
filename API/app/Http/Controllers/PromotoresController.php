<?php
namespace App\Http\Controllers;

use App\Models\Promotores;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\MessageBag;
use App\Http\Requests\PromotoreStore;

class PromotoresController extends Controller
{
    //tava comentado po
    public function index(){
    $promotores = Promotores::all();
    return response()->json($promotores);
    }

    public function show($id)
    {
        $promotor = Promotores::find($id);

            if ($promotor) {
                // O promotor foi encontrado, faça algo com as informações
                return response()->json(['promotor'=>$promotor]);
            } else {
                // O promotor não foi encontrado, trate o erro
                abort(404);
            }
    }

    public function store(Request $request)
    {
        $promotor = Promotores::create($request->all());
        return response()->json($promotor, 201);
    }
    
    public function destroy($id)
    {
        $promotor = Promotores::find($id);
        $promotor->delete();
        return response()->json(null, 204);
    }
    
}
