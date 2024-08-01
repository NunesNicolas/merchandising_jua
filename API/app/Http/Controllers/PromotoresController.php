<?php
namespace App\Http\Controllers;

use App\Models\Promotores;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
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
        // $promotor = Promotores::create($request->all());
        // return response()->json($promotor, 201);

        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'senha' => 'required|string|min:4',
            'telefone' => 'nullable|string|max:255',
            'img' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $promotorData = $request->only(['nome','email', 'senha', 'telefone', 'img']);

        $user = User::firstOrCreate([
            'email' => $promotorData['email'],
        ],[
            'name' => $promotorData['nome'],
            'password' => $promotorData['senha'],
            'role' => 'promoter',
        ]);
       
        $promotorData['senha'] = Hash::make($promotorData['senha']);
        $promotorData['user_id'] = $user->id;

        $promotor = Promotores::create($promotorData);
       
        return response()->json($promotor, 201);
    }
    
    public function destroy($id)
    {
        $promotor = Promotores::find($id);
        $promotor->delete();
        return response()->json(null, 204);
    }

    public function update(Request $request, $id)
    {
        $promotor = Promotores::find($id);
        $promotor->update($request->all());
        return response()->json($promotor);
    }
    
}
