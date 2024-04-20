@extends('layouts.app')
@section('title','produtos')

@section( 'content' )
<!-- Copie esse main de cima quando for copiar a navbar-->

    <div class="d-flex" style="width: 100%; height: 5vh; justify-content:space-between; padding:10px">
      <p class="ml-4 mr-auto" style="color:#858585; font-weight: bold; font-size: 2.2vh;" > Produtos   </p>
      <p class="mr-3" style="color:#858585; font-weight: bold; font-size: 2.2vh;"> Dashboard / Produtos  </p>
    </div>

    <div class="dash mt-2" style="width: 90vw;">
   
    {{-- <nav id="container" style="display: flex; text-aling: center; justify-content: space-between"> --}}

<div>
    <div class="d-flex" style="justify-content: space-between">
        <div class="bg-white d-flex" style=" justify-content: space-evenly; flex-wrap: wrap; width: 20vw; height:20vh; border-radius: 10px; margin: 10px; padding: 1vh; box-shadow: 0vh 0vh 0.1vh 0.1vh #c0c0c0;">
            <h6 style=" width: 15vw; height: 9vh;">Tempo médio de atendimento:</h6>
            <img src="https://cdn.discordapp.com/attachments/1145841372402819143/1229234582977515530/image.png?ex=662ef0ea&is=661c7bea&hm=cbba8302d8813fb5400af32d50008f33a783042805293df5727532541708fda6&" style="width: 4vw; height: 8vh;">
            <div style="height: 6vh; width: 20vw;"></div>
            <p style="font-size: 1.5vh; width: 20vw; height:3vh;">Tempo medio de atendimento 14/04/2024</p>
          </div>
          <div class="bg-white d-flex" style=" justify-content: space-evenly; flex-wrap: wrap; width: 20vw; height:20vh; border-radius: 10px; margin: 10px; padding: 1vh; box-shadow: 0vh 0vh 0.1vh 0.1vh #c0c0c0;">
            <h6 style=" width: 15vw; height: 9vh;">Tempo médio de atendimento:</h6>
            <img src="https://cdn.discordapp.com/attachments/1145841372402819143/1229234582977515530/image.png?ex=662ef0ea&is=661c7bea&hm=cbba8302d8813fb5400af32d50008f33a783042805293df5727532541708fda6&" style="width: 4vw; height: 8vh;">
            <div style="height: 6vh; width: 20vw;"></div>
            <p style="font-size: 1.5vh; width: 20vw; height:3vh;">Tempo medio de atendimento 14/04/2024</p>
          </div>
        
          
        <div style='text-align:right; margin-right:-28px; align-items: right' class=" mt-2 ml-auto " >
            <div class="mb-2"><a href="{{route('Produtos-create')}}"><button class="btn btn-primary" style="background-color: #2c9aff; border-radius: 30px; text-align: center; border: none;  font-weight:bold; width: 100%"><font color="#ffffff">ADICIONAR PRODUTO</font></button></a></div>
            <div><button class="btn btn-primary" style="background-color: #ffffff; border-radius: 30px; text-align: center; border: solid 2px; color:#bbbbbb;  font-weight:bold"><font color="#bbbbbb">CONFIGURAR PERIODICIDADE</font></button></div>
        </div>
    </div>
    {{-- </nav> --}}

        </div>

    </div>
    
    <div id="container" style="display: flex; flex-wrap: wrap;">

        @foreach($produtos as $produto)

        <div class="card" style="justify-content: center; align-items: center; border-radius: 10px; width: 280px; height: 280px; display: flex; margin: 10px;">
            <img class="" style="height: 33vh; width: 33vh;" src="<?php echo $produto->img; ?>" alt="..." >
            <div class="mt-2" style="text-align: center">
                <a href="{{route('Produtos-info',['id'=>$produto->id])}}" class="btn btn-primary" style="text-align: center; background: #2c9aff; width: 250px">Detalhes</a>                 
            </div>
        </div>
        @endforeach
    </div>

</main>
@endsection
