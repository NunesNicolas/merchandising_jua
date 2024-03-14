@extends('layouts.app')

@section('content')

 <h1>Users</h1>
 <p>pare</p>
 <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">nome</th>
      <th scope="col">email</th>
      <th scope="col">senha</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <th>{{ $user->id }}</th>
      <th>{{ $user->name }}</th>
      <th>{{ $user->email }}</th>
      <th>{{ $user->password }}</th>
    </tr>
    @endforeach
  <tbody>
</table>

@endsection 