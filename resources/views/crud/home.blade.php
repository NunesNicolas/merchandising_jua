@extends('layouts.app')

@section('content')
<head>
  <div class ="mt-4">
  <h1 class = "text-center">Lista de Usuarios</h1>
  
  </div>
</head>
<div style='text-align:right' class="mr-4" >
<a href="{{route('Usuario-create')}}"><button class="btn btn-success">Adicionar Usuário</button></a>
</div>
<table class="table mt-1">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Telefone</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
      <tr>
        <th scope = "row">{{ $user->id }}</th>
        <td>{{ $user->nome }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->telefone }}</td>
      </tr>
      @endforeach
  </tbody>
</table>


@endsection 