<?php
namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\MessageBag;
use App\Http\Requests\UsuarioStore;

class UsuarioController extends Controller
{
    public function home(){
    $users = Usuario::all();
    return view('crud.home', ['users'=>$users]);
    }
    
    public function create(){
        return view('crud.create');
    }
    
    public function store(UsuarioStore $request){
        Usuario::create($request->all());
        return redirect()->route('Usuario-home');
    }
    public function edit($id){
        $users = Usuario::where('id',$id)->first();
        if(!empty($users)){
            return view('crud.edit', ['users'=>$users]);
        }
        else{
            return redirect()->route('Usuario-home');
        }
    }
    public function update(UsuarioStore $request, $id)
    {
        $date = [
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
         ];
        Usuario::where('id',$id)->update($date);
        return redirect()->route('Usuario-home');
    }
    public function destroy($id){
        Usuario::where('id',$id)->delete();
        return redirect()->route('Usuario-home');
    }
    
}
