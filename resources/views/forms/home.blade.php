@extends('layouts.app')


<title> Listagem e Criação de Novos Itens</title>

<div class="container mt-2">
    <div class="row">
        <div class="col-sm-11">
            <h1 style="text-align:justify">Criação de Itens</h1>
        </div>
        <div style='text-align:right' class="mr-2" >
        <a href="{{route('Produtos-create')}}"><button class="btn btn-success">Adicionar Produto</button></a>
        </div>
        <div style='text-align:right' class="mr-2" >
            <a href="{{route('Empresas-create')}}"><button class="btn btn-success">Adicionar Empresa</button></a>
            </div>
            <div style='text-align:right' class="mr-4" >
              <a href="{{route('Promotor-create')}}"><button class="btn btn-success">Adicionar Promotor</button></a>
              </div>
    </div>  

    <h1 style="text-align:justify">Listagens Produtos:</h1>

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
                <th class="d-flex">
                    <div>
                    <a href="{{ route('Produtos-edit', ['id'=>$produto->id]) }}" class="btn btn-primary mr-2;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                      </svg>
                    </a>
                    </div>
                    <form action="{{ route('Produtos-destroy', ['id'=>$produto->id]) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                          <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                        </svg>
                      </button>
                    </form>
                  </th>
                </tr>
          @endforeach
            </tbody>
          </table>

          <h1 style="text-align:justify">Listagens Empresas:</h1>

          <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">CNPJ</th>
                <th scope="col">Latitude</th>
                <th scope="col">Longitude</th>
                <th scope="col">Descrição</th>
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
                  <th class="d-flex">
                    <div>
                      <a href="{{ route('Empresas-edit', ['id'=>$empresa->id]) }}" class="btn btn-primary mr-2" style="heigh:;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                          <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                          <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                      </a>
                    </div>
                      
                      <form action="{{ route('Empresas-destroy', ['id'=>$empresa->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                          </svg>
                        </button>
                      </form>
                    </th>
                  </tr>
            @endforeach
              </tbody>
            </table>
            <h1 style="text-align:justify">Listagens Promotores:</h1>
            <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">Telefone</th>
                <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($promotors as $promotor)
                    <tr>
                    <th>{{ $promotor->id }}</th>
                    <th>{{ $promotor->nomepromotor }}</th>
                    <th>{{ $promotor->emailpromotor }}</th>
                    <th>{{ $promotor->statuspromotor }}</th>
                    <th>{{ $promotor->telefonepromotor }}</th>
                    <th class="d-flex">
                        <div>
                        <a href="{{ route('Promotor-edit', ['id'=>$promotor->id]) }}" class="btn btn-primary mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                        </a>
                        </div>
                        <form action="{{ route('Promotor-destroy', ['id'=>$promotor->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                            </svg>
                        </button>
                        </form>
                    </th>
                    </tr>
            @endforeach
                </tbody>
            </table>
