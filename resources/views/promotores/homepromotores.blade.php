@extends('layouts.app')
@section('title','promotores')

@section( 'content' )
<nav class="fixed-left" style="
    width: 5vw;
    height: 100vh;
    position: fixed;
    z-index: 2;
    display: flex;
    justify-content: spacy-evenly;
    flex-wrap: wrap;
    padding-top:20vh;
    background-color: #2C9AFF;
">
    <div class="d-flex flex-row flex-wrap" style="width: 5vw; height:50vh; justify-content: center;">
        <a href="" class="border-collapse" style="display: flex; justify-content: center; width: 4vw;  height: 8vh; padding-top: 1vh; border-radius: 1vh;">
            <svg xmlns="http://www.w3.org/2000/svg" style="color: white; width: 3vw;  height: 6vh;" fill="currentColor" class="bi bi-grid-1x2-fill" viewBox="0 0 16 16">
              <path d="M0 1a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm9 0a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1zm0 9a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1z"/>
            </svg>        
</a>
        <a href="" class="border-collapse-" style="display: flex;justify-content: center; width: 4vw;  height: 8vh; padding-top: 1vh; border-radius: 1vh;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-basket2-fill" style="color: white; width: 3vw; height: 6vh;" viewBox="0 0 16 16">
              <path d="M5.929 1.757a.5.5 0 1 0-.858-.514L2.217 6H.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h.623l1.844 6.456A.75.75 0 0 0 3.69 15h8.622a.75.75 0 0 0 .722-.544L14.877 8h.623a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1.717L10.93 1.243a.5.5 0 1 0-.858.514L12.617 6H3.383zM4 10a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0zm3 0a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0zm4-1a1 1 0 0 1 1 1v2a1 1 0 1 1-2 0v-2a1 1 0 0 1 1-1"/>
            </svg>
        </a>
        <a href="" class="border-collapse-" style="display: flex;justify-content: center; width: 4vw;  height: 8vh; padding-top: 1vh; border-radius: 1vh;">
            <svg xmlns="http://www.w3.org/2000/svg" style="color: white; width: 3vw;  height: 6vh;" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
              <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
            </svg>
        </a>
        <a href="" class="border-collapse-" style="display: flex;justify-content: center; width: 4vw;  height: 8vh; padding-top: 1vh; border-radius: 1vh;">
            <svg xmlns="http://www.w3.org/2000/svg" style="color: white; width: 3vw;  height: 6vh;" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
              <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
            </svg>

        </a>

        <a href="" class="border-collapse-" style="display: flex;justify-content: center; width: 4vw;  height: 8vh; padding-top: 1vh; border-radius: 1vh;">
            <svg xmlns="http://www.w3.org/2000/svg" style="color: white; width: 3vw;  height: 6vh;" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
              <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
            </svg>
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

    <div class="d-flex" style="width: 100%; height: 5vh; justify-content:space-between; padding:10px">
      <p class="ml-4 mr-auto" style="color:#858585; font-weight: bold; font-size: 2.2vh;" > Promotores   </p>
      <p class="mr-3" style="color:#858585; font-weight: bold; font-size: 2.2vh;"> Dashboard / Promotores  </p>
    </div>

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
            <div style='text-align:right; margin-right:-28px' class=" mt-2 ml-auto" >
                <a href="{{route('Promotores-create')}}"><button class="btn btn-primary" style="background-color: #2c9aff; border-radius: 30px; text-align: right; border: none"><font color="#ffffff">Adicionar Promotor</font></button></a>
            </div>
        </nav>
       
    </div>
</main>
@endsection
