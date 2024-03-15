<?php
namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\MessageBag;

class UsuarioController extends Controller
{
    public function home(){
    $users = Usuario::all();
    return view('crud.home', ['users'=>$users]);
    }
    
    public function create(){
        return view('crud.create');
    }
    
    public function store(Request  $request){
        $validator = $request->validate([
        'nome'     =>  'required|min:10',
        'email'    =>  'sometimes|required|email',
        'telefone' =>  'required|min:10',
        ]);
        
        Usuario::create($request->all());
        return redirect()->route('Usuario-home');
    }
}
