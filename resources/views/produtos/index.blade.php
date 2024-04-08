@extends('layouts.app')

@section('title', 'Listagem')

@section('content')

  <div class="container mt-5">
  <div class="row">
      <div class="col-sm-10">
          <h1>Listagem de Produtos</h1>
      </div>
      <div style='text-align:right' class="mr-4" >
      <a href="{{route('Produtos-create')}}"><button class="btn btn-success">Adicionar Produto</button></a>
      </div>
  </div>

  <table class="table">
  <thead>
      <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Preço</th>
      <th scope="col">Marca</th>
      <th scope="col">Tipo</th>
      <th scope="col">Vendas</th>
      <th scope="col">...</th>
      </tr>
  </thead>
  <tbody>
  @foreach ($produtos as $produto)
        <tr>
          <th>{{ $produto->id }}</th>
          <th>{{ $produto->nomeproduto }}</th>
          <th>{{ $produto->precoproduto }}</th>
          <th>{{ $produto->marcaproduto }}</th>
          <th>{{ $produto->tipoproduto }}</th>
          <th>{{ $produto->numerovendas }}</th>
          <th>
            <a href="#">Editar</a>
          </th>
        </tr>
  @endforeach
    </tbody>
  </table>