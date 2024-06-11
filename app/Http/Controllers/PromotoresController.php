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
    public function home(){
    $promotores = Promotores::all();
    return response()->json(['promotores'=>$promotores]);
    }
    
    public function create(){
        return view('promotores.criarpromotores');
    }

    public function info ($id){

        $promotor = Promotores::find($id);

        if ($promotor) {
            // O promotor foi encontrado, faça algo com as informações
            return response()->json(['promotor'=>$promotor]);
        } else {
            // O promotor não foi encontrado, trate o erro
            abort(404);
        }
    }
 

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
    public function update(PromotoreStore $request, $id)
    {
        $date = [
            'nome' => $request->nome,
            'img' => $request->email,
            'weight' => $request->weight,  
         ];
        Promotore::where('id',$id)->update($date);
        return redirect()->route(/*'Usuario-home'*/);
    }
    public function destroy($id){
        Promotore::where('id',$id)->delete();
        return redirect()->route(/*'Usuario-home'*/);
    }
    
}
