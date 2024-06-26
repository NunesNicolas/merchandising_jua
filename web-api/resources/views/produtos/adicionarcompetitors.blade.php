@extends('layouts.app')

@section('title','criação')

@section('content')
  <div class="conteiner mt-4  ml-5 mr-5 ">
        <h1>Novo Concorrente
        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
  <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
</svg></h1>
        <hr>
            <form action="{{ route('Competitors-store') }}" method="POST">
            @csrf
                <div class ="form-group">
                    <label for="nomeproduto">Nome produto concorrente:</label>
                    <input type="text" class ="form-control" name="nome" placeholder="Digite um nome">
                </div>
                @error('nome')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
                <div class ="form-group" style="">
                    <label for="marcaconcorrente">Selecione a marca do concorrente:</label>

                    <select class="custom-select my-1" name="brand" id="brand" style="color: rgba(70, 70, 70, 0.749)">
                        <option selected disabled>Escolha a marca</option>
                        <option text="ype">Ypê</option>
                        <option text="downy">Downy</option>
                    </select>
                    
                    {{-- <label for="precoproduto">adicione o link da imagem do seu produto:</label>
                    <input type="text" class ="form-control" name="img" placeholder="Digite um Preço"> --}}
                </div>
                {{-- @error('img')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror --}}
                <br>
                
                <label for="marcaproduto">Selecione a variação do produto da juá:</label>
                <select class="custom-select my-1" name="product_id" id="product_id" style="color: rgba(70, 70, 70, 0.749)">
                    <option selected disabled>Escolha a variação</option>
                    @foreach ($produtos as $produto)
                    
                    <option value="{{$produto->id}}"><?php echo $produto->nome , $produto->weight; ?></option>
                    @endforeach
                </select>
                <br><br>
                <button type="submit" class="btn btn-primary">Adicionar concorrente</button>
            
            </form>
    </div>
</main>
@endsection