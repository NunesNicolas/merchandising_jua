@extends('layouts.app')

@section('content')

 <h1>Users</h1>
  <tbody>
    @foreach($users as $user)
    <tr>
      <th>{{ $user->id }}</th>
      <th>{{ $user->nome }}</th>
      <th>{{ $user->email }}</th>
      <th>{{ $user->telefone }}</th>
      
    </tr>
    @endforeach
  <tbody>
</table>

@endsection 