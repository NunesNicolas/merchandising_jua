<?php

namespace App\Http\Controllers;

use App\Models\Promotor;
use Illuminate\Http\Request;

class PromotorsController extends Controller
{

    public function index()
    {
        $promotors = Promotor::all();
        return view('promotores.homepromotor', ['promotors'=>$promotors]);
    }
    public function create()
    {
        return view('promotores.createpromotor');
    }
    public function store(Request $request)
    {
        Promotor::create($request->all());
        return redirect()->route('Promotor-index');
    }
    public function edit($id)
    {
        $promotors = Promotor::where('id', $id)->first();
        if(!empty($promotors))
        {
            return view('promotores.editpromotor', ['promotors'=>$promotors]);        
        }
        else
        {
            return redirect()->route('Promotor-index');
        }
    }
    public function update(Request $request, $id)
    {
        $data = [
            'nomepromotor' => $request->nomepromotor,
            'emailpromotor' => $request->emailpromotor,
            'statuspromotor' => $request->statuspromotor,
            'telefonepromotor' => $request->telefonepromotor,

        ];
        Promotor::where('id', $id)->update($data);
        return redirect()->route('Promotor-index');
    }
    public function destroy($id)
    {
        Promotor::where('id', $id)->delete();
        return redirect()->route('Promotor-index');
    }
}
