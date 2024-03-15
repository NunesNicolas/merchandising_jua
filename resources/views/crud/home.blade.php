@extends('layouts.app')

@section('content')

<table class="table mt-5">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Numero</th>
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