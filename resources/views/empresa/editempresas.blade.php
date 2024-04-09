@extends('layouts.app')

@section('title','edição')

    @section('content')
  <div class="conteiner mt-4  ml-5 mr-5 ">
        <h1>Editar Empresa
        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
  <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
</svg></h1>
        <hr>
            <form action="{{ route('Empresas-update', ['id'=>$empresa->id]) }}" method="POST">
            @csrf
            @method('PUT')
                <div class ="form-group">
                    <label for="nome">Nome da Empresa:</label>
                    <input type="text" class ="form-control" name="nome" value=" {{$empresa->nome}} " placeholder="Nome">
                </div>
                <br>
                <div class ="form-group">
                    <label for="cnpj">CNPJ:</label>
                    <input type="text" class ="form-control" name="cnpj" value=" {{$empresa->cnpj}} " placeholder="CNPJ">
                </div>
                <br>
                <div class ="form-group">
                    <label for="latitude">latitude:</label>
                    <input type="text" class ="form-control" name="latitude" value=" {{$empresa->latitude}} " placeholder="latitude">
                </div>
                <br>
                <div class ="form-group">
                    <label for="longitude">Longitude:</label>
                    <input type="text" class ="form-control" name="longitude" value=" {{$empresa->longitude}} " placeholder="longitude">
                </div>
                <br>
                <div class ="form-group">
                    <label for="descricao">Descrição:</label>
                    <input type="text" class ="form-control" name="descicao" value=" {{$empresa->descricao}} " placeholder="Descrição">
                </div>
                <br>
                <div class ="form-group">
                    <input type="submit" nome="submit" class="btn btn-success" value="Atualizar">
                </div>

            </form>
  </div>
    @endsection