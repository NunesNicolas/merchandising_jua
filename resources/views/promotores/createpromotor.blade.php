@extends('layouts.app')

@section('title','criação')

    @section('content')
  <div class="conteiner mt-4  ml-5 mr-5 ">
        <h1>Novo Promotor
        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
  <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
</svg></h1>
        <hr>
            <form action="{{ route('Promotor-store') }}" method="POST">
            @csrf
                <div class ="form-group">
                    <label for="nomepromotor">Nome do promotor:</label>
                    <input type="text" class ="form-control" name="nomepromotor" placeholder="Digite um Nome">
                </div>
                <br>
                <div class ="form-group">
                    <label for="emailpromotor">Email:</label>
                    <input type="text" class ="form-control" name="emailpromotor" placeholder="Digite um Preço">
                </div>
                <br>
                <div class ="form-group">
                    <label for="telefonepromotor">Telefone Promotor:</label>
                    <input type="text" class ="form-control" name="telefonepromotor" placeholder="Digite uma Marca">
                </div>
                <br>
                <div class ="form-group">
                    <label for="statuspromotor">Status Promotor:</label>
                    <input type="text" class ="form-control" name="statuspromotor" placeholder="Digite um Tipo">
                </div>
                <br>
                <div class ="form-group">
                    <input type="submit" nome="submit" class="btn btn-primary">
                </div>

            </form>
  </div>
    @endsection