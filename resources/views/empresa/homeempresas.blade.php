@extends('layouts.app')

@section('title', 'Listagem')

<title>Empresa</title>

@section('content')

  <div class="container mt-5">
  <div class="row">
      <div class="col-sm-10">
          <h1>Listagem de empresas</h1>
      </div>
      <div style='text-align:right' class="mr-4" >
      <a href="{{route('Empresas-create')}}"><button class="btn btn-success">Adicionar Produto</button></a>
      </div>
  </div>

  <table class="table">
  <thead>
      <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">cnpj</th>
      <th scope="col">latitude</th>
      <th scope="col">longitude</th>
      <th scope="col">descrição</th>
      <th scope="col">...</th>
      </tr>
  </thead>
  <tbody>
  @foreach ($empresas as $empresa)
        <tr>
          <th>{{ $empresa->id }}</th>
          <th>{{ $empresa->nome }}</th>
          <th>{{ $empresa->cnpj }}</th>
          <th>{{ $empresa->latitude }}</th>
          <th>{{ $empresa->longitude }}</th>
          <th>{{ $empresa->descricao }}</th>
        </tr>
    @endforeach
    </table>
  </tbody>