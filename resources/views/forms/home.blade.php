@extends('layouts.app')


<title> Listagem </title>

<div class="container mt-2">
    <div class="row">
        <div class="col-sm-11">
            <h1 style="text-align:justify">Listagem de Produtos</h1>
        </div>
        <div style='text-align:right' class="mr-2" >
        <a href="{{route('Produtos-create')}}"><button class="btn btn-success">Adicionar Produto</button></a>
        </div>
    </div>
