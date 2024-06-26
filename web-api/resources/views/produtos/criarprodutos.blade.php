@extends('layouts.app')

@section('title','criar produto')

@section('link')
<link rel="stylesheet" href="{{asset('assets/css/create_produtos.css')}}">
<script src="{{asset('assets/js/create_pd.js')}}" defer></script>
@endsection

@section('content')

  <div class="conteiner mt-4  ml-5 mr-5 ">
        <h1>Novo Produto
        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
  <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
</svg></h1>
        <hr>
            <form action="{{ route('Produtos-store') }}" method="POST">
            @csrf
                <div class ="form-group">
                    <label for="nomeproduto">Nome do Produto:</label>
                    <input type="text" class ="form-control" name="nome" placeholder="Digite um Nome">
                </div>
                @error('nome')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
                <div class ="form-group">
                    <label for="precoproduto">adicione o link da imagem do seu produto:</label>
                    <input type="text" class ="form-control" name="img" placeholder="Digite um Preço">
                </div>
                @error('img')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
                <div class="d-flex">
                    <input class="switch" id="unit-switch" type="checkbox" checked="true">
                    <h5 id="unit-text" style="margin-top: -0.9vh; margin-left: 1.5vh;">por Litro</h5>
                </div>

                <br>
               
                <table class="d-flex">
                         <div class="form-check">
                        <input id="weight500" name="weight500" value="500" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label id="unit-weight0,5" class="form-check-label" for="flexCheckDefault">
                           500ml
                        </label>
                        </div>
                        <div class="form-check">
                        <input id="weight1000" name="weight1000" value="1000" class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label id="unit-weight1" class="form-check-label" for="flexCheckChecked">
                            1L
                        </label>
                        </div>
                        <div class="form-check">
                        <input id="weight5000" name="weight5000" value="5000" class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label id="unit-weight5"class="form-check-label" for="flexCheckChecked">
                            5L
                        </label>
                        </div>
                        </table>
                <br>
                <button type="submit" class="btn btn-primary">Criar Produto</button>


            
            </form>
    </div>
</main>
@endsection