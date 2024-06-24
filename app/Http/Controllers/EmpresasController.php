<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresasController extends Controller
{
    public function index(){
        $empresas = Empresa::all();
        return response()->json(['empresas'=>$empresas]);
    }

    public function create()
    {
        return view('empresa.createempresas');
    }

    public function store(Request $request)
    {
        Empresa::create($request->all());
        return redirect()->route('Empresas-index');
    }

    public function info($id)
    {
        $empresa = Empresa::where('id', $id)->first();
    
            return view('empresa.info', ['empresas'=>$empresa]);        

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
