@extends('layouts.app')
@section('title','promotores')

@section( 'content' )
<nav class="bg-primary fixed-left" style="
    width: 5vw;
    height: 100vh;
    position: fixed;
    z-index: 2;
    display: flex;
    justify-content: spacy-evenly;
    flex-wrap: wrap;
    padding-top:20vh;
" >
    <div class="d-flex flex-row flex-wrap" style="width: 5vw; height:50vh; justify-content: center;">
        <a href="" class="bg-primary border-collapse-" style="display: flex;justify-content: center; width: 4vw;  height: 8vh; padding-top: 1vh; border-radius: 1vh;">
            <img src="https://cdn-icons-png.flaticon.com/512/1077/1077979.png" style="width: 3vw; height: 5vh;">
        </a>
        <a href="" class="bg-primary border-collapse-" style="display: flex;justify-content: center; width: 4vw;  height: 8vh; padding-top: 1vh; border-radius: 1vh;">
            <img src="https://cdn-icons-png.flaticon.com/512/1077/1077979.png" style="width: 3vw; height: 5vh;">
        </a>
        <a href="" class="bg-primary border-collapse-" style="display: flex;justify-content: center; width: 4vw;  height: 8vh; padding-top: 1vh; border-radius: 1vh;">
            <img src="https://cdn-icons-png.flaticon.com/512/1077/1077979.png" style="width: 3vw; height: 5vh;">
        </a>
        <a href="" class="bg-primary border-collapse-" style="display: flex;justify-content: center; width: 4vw;  height: 8vh; padding-top: 1vh; border-radius: 1vh;">
            <img src="https://cdn-icons-png.flaticon.com/512/1077/1077979.png" style="width: 3vw; height: 5vh;">
        </a>
    </div>
</nav>
<main  style="
    widht:95vw;
    height:200vh;
    margin-left: 5vw;
"><!-- Copie esse main de cima quando for copiar a navbar-->
<nav class="navbar bg-body-tertiary" style="
        background-color: #ffffff;
        width: 100%; 

    ">
    <div class="container-fluid">
      <a class="navbar-brand ml-auto">
        <img src="https://www.pngall.com/wp-content/uploads/5/Profile-PNG-Pic.png" alt="Perfil" width="30" height="35">
        Olá, Selso soares! 
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
        <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z"/>
        </svg>
      </a>
    </div>
</nav>


    <div class="dash mt-2" style="width: 90vw;">
 
        <nav id="container" style="display: flex; text-aling: center">
        
        <div id="container" style="display: flex; text-aling: center; flex-wrap: wrap">
    @foreach($promotores as $promotor)
        <div class="card" style="justify-content: center;border-radius: 10px; width: 235px; display: flex; text-align:left; margin: 10px; justify-content">
            <div class="card-body" style="height: 12rem">
                <svg viewBox="0 0 200 200">
                    <clipPath id="clipCircle">
                        <circle cx="100" cy="80" r="75" />
                    </clipPath>
                    <circle cx="100" cy="81" r="75" width="100" height="100" fill="none" stroke="grey" stroke-width="3"/>
                    <image xlink:href="https://www.pngall.com/wp-content/uploads/5/Profile-PNG-Pic.png" width="200" height="200" clip-path="url(#clipCircle)" y="-20"/>
                </svg>
            </div>    
            <ul class="list-group list-group-flush">
            <li class="list-group-item" style="background-color:#d3d6db; border: none; border-top-left-radius: 10px;border-top-right-radius: 10px"><h6>Nome do Promotor:</h6> {{ $promotor->nome }} </li>
            <li class="list-group-item" style="background-color:#d3d6db; border: none"><h6>Email do Promotor:</h6>  {{ $promotor->email}}</li>
            <li class="list-group-item"  style="background-color:#d3d6db; border: none"><h6>Status do Promotor:</h6></li>
            <a href="" style="text-align: center;   background-color: #2c9aff;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px"><li button type="button" class="btn" ><font color="#ffffff">Detalhes</font></li></button></a>
            </ul>
        </div>
    @endforeach
        </div>
            <div style='text-align:right' class="mr-5 ml-auto" >
                <a href="{{route('Promotores-create')}}"><button class="btn btn-primary" style="background-color: #2c9aff; border-radius: 30px; text-align: right; border: none"><font color="#ffffff">Adicionar Promotor</font></button></a>
            </div>
        </nav>
       
    </div>
</main>
@endsection
