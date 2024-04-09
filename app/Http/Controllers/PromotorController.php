<?php

namespace App\Http\Controllers;

use App\Models\promotor;
use App\Models\promotore;
use Illuminate\Http\Request;

class PromotorController extends Controller
{
    public function index()
    {
        $promotores = Promotor::all();
        return view('forms.home', ['promotores'=>$promotores]);
    } 
    public function creat()
    {
        return view('promotor.criarpromotor');
    }      
    public function store(Request $request)
    {
        Promotor::create($request->all());
        return redirect()->route('forms-home');
    }
    public function edit($id)
    {
        $promotores = Promotor::where('id', $id)->first();
        if(!empty($promotores))
        {
            return view('forms.home', ['promotores'=>$promotores]);        
        }
        else
        {
            return redirect()->route('forms-home');
        }
    }
    
}
