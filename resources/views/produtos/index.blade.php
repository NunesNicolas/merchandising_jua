@extends('layouts.app')

@section('title', 'Listagem')

@section('content')

  <h1>Listagem de Produtos</h1>
  <table class="table">
  <thead>
      <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Preço</th>
      <th scope="col">Marca</th>
      <th scope="col">Tipo</th>
      <th scope="col">Vendas</th>
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
        </tr>
  @endforeach
    </tbody>
  </table>