<?php
namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{
    public function home(){
    $users = Usuario::all();
return view('crud.home', ['users'=>$users]);
    }
    
    public function create(){
        return view('crud.create');
    }
}
