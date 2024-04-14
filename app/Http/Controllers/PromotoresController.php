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
    public function home(){
    $promotores = Promotores::all();
    return view('test.homepromotores', ['promotores'=>$promotores]);
    }
    
    public function create(){
        return view('test.criarpromotores');
    }

    public function store(PromotoreStore $request){
        Promotores::create($request->all());
        return redirect()->route('Promotores-home');
    }
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
            'email' => $request->email,
            'senha' => bcrypt($request->senha),  
            'telefone' => $request->telefone,
         ];
        Promotore::where('id',$id)->update($date);
        return redirect()->route('Usuario-home');
    }
    public function destroy($id){
        Promotore::where('id',$id)->delete();
        return redirect()->route('Usuario-home');
    }
    
}
