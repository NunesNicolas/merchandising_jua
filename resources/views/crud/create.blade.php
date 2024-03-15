@extends('layouts.app')

    @section('title')
        create
    @endsection

    @section('content')
  <div class="conteiner mt-4  ml-5 mr-5 ">
        <h1>novo usuario</h1>
        <hr>
            <form action="" method="POST">
                <div class ="form-group ml-5 mr-5">
                    <label for="nome">Nome:</label>
                    <input type="text" class ="form-control" name="nome" placeholder="digite um nome">
                </div>
                <br>
                <div class ="form-group ml-5 mr-5">
                    <label for="nome">Email:</label>
                    <input type="text" class ="form-control" name="Email" placeholder="digite um Email">
                </div>
                <br>
                <div class ="form-group ml-5 mr-5">
                    <label for="nome">Telefone:</label>
                    <input type="text" class ="form-control" name="Telefone" placeholder="digite um Telefone">
                </div>
                <br>
                <div lass ="form-group">
                    <input type="submit" nome="submit" class="btn btn-primary">
                </div>

            </form>
  </div>
    @endsection