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

class UserController extends Controller
{   
    private $data = array();
    
    public function inicial(){}

    public function login(){
        if (!Auth::attempt($request->only(['email', 'password']))) {
        return view('index', ['users'=>$users]);
        }
    return to_route('inicial');
    }

    public function dashboard(){
    return view('index', ['users'=>$users]);
    }
}
