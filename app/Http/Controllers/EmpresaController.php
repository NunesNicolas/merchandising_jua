<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\empresa;
use App\Requests\EmpresaStore;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function empresas(){
        return view('forms.empresas');
    }
    public function home(){
        $users = empresa::all();
        return view('forms.home', ['users'=>$users]);
        }
        
        public function create(){
            return view('crud.create');
        }
        
        public function store($request){
            empresa::create($request->all());
            return redirect()->route('Usuario-home');
        }
        public function edit($id){
            $users = empresa::where('id',$id)->first();
            if(!empty($users)){
                return view('crud.edit', ['users'=>$users]);
            }
            else{
                return redirect()->route('Usuario-home');
            }
        }
        public function update($request, $id)
        {
            $date = [
                'nome' => $request->nome,
                'email' => $request->email,
                'telefone' => $request->telefone,
             ];
            Empresa::where('id',$id)->update($date);
            return redirect()->route('Usuario-home');
        }
        public function destroy($id){
            Empresa::where('id',$id)->delete();
            return redirect()->route('Usuario-home');
        }
}
