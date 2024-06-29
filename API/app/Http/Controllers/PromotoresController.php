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

    // public function savePromotor(Request $request) {

    //     $promotor = $request->input('promotor');
    //     $promotor = new Promotores();
    //     $promotor->nome = $request->input('nome');
    //     $promotor->email = $request->input('email');
    //     $promotor->senha = $request->input('senha');
    //     $promotor->telefone = $request->input('telefone');
    //     $promotor->save();
    //     return response()->json(['message' => 'Sucessfully promotor', 'code' => 200]);
    // }  

    
    // public function create(){
    //     return view('promotores.criarpromotores');
    // }

    
    // public function info ($id){

    //     $promotor = Promotores::find($id);

    //     if ($promotor) {
    //         // O promotor foi encontrado, faça algo com as informações
    //         return response()->json(['promotor'=>$promotor]);
    //     } else {
    //         // O promotor não foi encontrado, trate o erro
    //         abort(404);
    //     }
    // }

 
    // public function store(PromotoreStore $request){
    //     Promotores::create($request->all());
    //     return redirect()->route('Promotores-home');
    // }
    // public function create(){
    //     return view('crud.create');
    // }
    
    // public function store(UsuarioStore $request){
    //     Usuario::create($request->all());
    //     return redirect()->route('Usuario-home');
    // }
    // public function edit($id){
    //     $users = Usuario::where('id',$id)->first();
    //     if(!empty($users)){
    //         return view('crud.edit', ['users'=>$users]);
    //     }
    //     else{
    //         return redirect()->route('Usuario-home');
    //     }
    // }

//     public function update(PromotoreStore $request, $id)
//     {
//         $date = [
//             'nome' => $request->nome,
//             'img' => $request->email,
//             'weight' => $request->weight,  
//          ];
//         Promotores::where('id',$id)->update($date);
//         return redirect()->route('Usuario-home');
//     }
//     public function destroy($id){
//         Promotores::where('id',$id)->delete();
//         return redirect()->route('Usuario-home');
//     }
    
}
