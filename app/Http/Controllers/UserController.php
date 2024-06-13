<?php
namespace App\Http\Controllers;

use App\Models\Promotores;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\MessageBag;
use App\Http\Requests\PromotoreStore;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{   
    private $data = array();
    
    public function inicial(){

    }

    public function login(Request $request){
        $promotor = Promotores::where('email', $request->input('email'))->first();
        // $senhaHashed = Hash::make($request->input('senha')); 
        // && Hash::check($request->input('senha'), $promotor->senha)
        if ($promotor->senha == $request->input('senha')) {
            return response()->json([
                'message' => 'Promotor encontrado',
                'code' => 200
            ]);
        } else {
            return response()->json([
                'message' => 'Email ou senha inválido(s)',
                'code' => 400
            ]);
        }
    }

    public function store(){

    }

    public function dashboard(){
    return view('index', ['users'=>$users]);
    }
}
