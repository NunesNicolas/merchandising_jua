<?php

namespace App\Http\Controllers;

use App\Models\Promotor;
use Illuminate\Http\Request;

class PromotoresController extends Controller
{
    public function index()
    {
        $promotores = Promotor::all();
        return view('promotores.homepromotor', ['promotores'=>$promotores]);
    } 
    public function create()
    {
        return view('promotores.criarpromotor');
    }      
    public function store(Request $request)
    {
        Promotor::create($request->all());
        return redirect()->route('Forms-index');
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
            return redirect()->route('Forms-index');
        }
    }
    public function update(Request $request, $id)
    {
        $data = [
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'status' => $request->status,

        ];
        Promotor::where('id', $id)->update($data);
        return redirect()->route('Forms-index');
    }
    public function destroy($id)
    {
        Promotor::where('id', $id)->delete();
        return redirect()->route('Forms-index');
    }
    
}
