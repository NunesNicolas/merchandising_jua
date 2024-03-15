@extends('layouts.app')

@section('title','create')

    @section('content')
  <div class="conteiner mt-4  ml-5 mr-5 ">
        <h1>novo usuario</h1>
        <hr>
            <form action="{{ route('Usuario-store') }}" method="POST">
            @csrf
                <div class ="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class ="form-control" name="nome" placeholder="digite um Nome">
                </div>
                <br>
                <div class ="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class ="form-control" name="email" placeholder="digite um Email">
                </div>
                <br>
                <div class ="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="text" class ="form-control" name="telefone" placeholder="digite um Telefone">
                </div>
                <br>
                <div class ="form-group">
                    <input type="submit" nome="submit" class="btn btn-primary">
                </div>

            </form>
  </div>
    @endsection