<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresasController extends Controller
{
    public function index(){
        $empresa = Empresa::all();
        return view('forms.home', ['empresas' => $empresa]);
    }

    public function create()
    {
        return view('empresa.createempresas');
    }

    public function store(Request $request)
    {
        Empresa::create($request->all());
        return redirect()->route('Forms-index');
    }

    public function edit($id)
    {
        $empresa = Empresa::where('id', $id)->first();
        if(!empty($empresa))
        {
            return view('empresa.editempresas', ['empresas'=>$empresa]);        
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
            'cnpj' => $request->cnpj,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'descricao' => $request->descricao,
        ];
        Empresa::where('id', $id)->update($data);
        return redirect()->route('Forms-index');
    }

    public function destroy($id)
    {
        Empresa::where('id', $id)->delete();
        return redirect()->route('Forms-index');
    }
}
