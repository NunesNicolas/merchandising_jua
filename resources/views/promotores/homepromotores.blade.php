@extends('layouts.app')
@section('title','promotores')

@section( 'content' )

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

                <li class="list-group-item" style="background-color:#e7e7e7; border: none; border-top-left-radius: 10px;border-top-right-radius: 10px">
                    <h6 style="color:#858585">Nome do Promotor:</h6> <p style="color:#8d8d8d; margin-bottom: -10px">{{ $promotor->nome }} </p></li>
                <li class="list-group-item" style="background-color:#e7e7e7; border: none">
                    <h6 style="color:#858585">Email do Promotor:</h6>  <p style="color:#8d8d8d; margin-bottom: -10px">{{ $promotor->email}}</p></li>
                <li class="list-group-item"  style="background-color:#e7e7e7; border: none">
                    <h6 style="color:#858585">Status do Promotor:</h6></li>
                
                <a href="{{route('Promotores-info',['id'=>$promotor->id])}}" style="text-align: center;   background: #2c9aff;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px">
                <li button type="button" class="btn" ><font color="#ffffff">Detalhes</font></li></button></a>
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
