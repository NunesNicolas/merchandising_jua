@extends('layouts.app')


<title> Promotor </title>

<h1 class="text-center"> Questionário do Promotor </h1>


<form action="{{ route('Empresas-forms') }}" method="POST">
            @csrf
                <div class ="form-group">
                    <label for="nome">Nome da empresa:</label>
                    <input type="text" class ="form-control" name="nome" placeholder="Nome">
                </div>
                <br>
                <div class ="form-group">
                    <label for="email">CNPJ:</label>
                    <input type="text" class ="form-control" name="email" placeholder="CNPJ">
                </div>
                <br>
                <div class ="form-group">
                    <label for="telefone">ID:</label>
                    <input type="text" class ="form-control" name="telefone" placeholder="digite um Telefone">
                </div>
                <div class ="form-group">
                    <label for="status">Descrição:</label>
                    <input type="text" class ="form-control" name="status" placeholder="digite um Status">
                </div>
                 <div class ="form-group">
                    <label for="status">Latitude:</label>
                    <input type="text" class ="form-control" name="status" placeholder="digite um Status">
                </div>
                 <div class ="form-group">
                    <label for="status">Longitude:</label>
                    <input type="text" class ="form-control" name="status" placeholder="digite um Status">
                </div>
                <br>
                <br>
                <div class ="form-group">
                    <input type="submit" nome="submit" class="btn btn-primary">
                </div>

            </form>
  </div>