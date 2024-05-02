@extends('layouts.app')

@section('title','criação')

    @section('content')
    <div class="d-flex" style="width: 100%; height: 5vh; justify-content:space-between; padding:10px">
      <p class="ml-4 mr-auto" style="color:#858585; font-weight: bold; font-size: 2.2vh;" > Clientes   </p>
      <p class="mr-3" style="color:#858585; font-weight: bold; font-size: 2.2vh;"> Dashboard / Clientes  </p>
    </div>

    <div  class="d-flex" style="width: 100%; height: 3vh; justify-content: end; padding:35px">
        <a href="{{route('Promotores-home')}}" type="button" class="btn btn-light align-self-center" style="
        border-radius: 20px;
        border:solid #858585 0.2vh;
        color:#858585;
        font-weight: bold;
        font-size:13px
        "> VOLTAR </a>
    </div>

    <!-- BOX 1 -->

        <!-- BX1: LINHA 1 -->
    <div class="bg-white ml-3 mr-3" style="margin-top:-1vh; height:40vh; border-radius: 1vh; padding: 1vh; box-shadow: 0vh 0vh 0.1vh 0.1vh #c0c0c0;">
          <div class= "d-flex">
            
          </div>

          <div class= "d-flex" style="height: 10%">
            <li class="list-group-item ml-0 mr-2" style="width: 50%; border: none; border-radius: 10px">
                <p style="font-size:15px;color:#858585;font-weight: bold; margin-top:-10px"> Nome cliente</p>
            </li>

            <li class="list-group-item ml-0 mr-3" style="width: 50%; border: none; border-radius: 10px">
                <p style="font-size:15px;color:#858585;font-weight: bold; margin-top:-10px">CNPJ</p>
            </li>
               
        </div>
        <div class= "d-flex" style="height: 12%">
            <li class="list-group-item ml-3 mr-2" style="width: 50%; background-color:#e7e7e7; border: none; border-radius: 10px">
                <p style="font-size:15px;color:#8d8d8d; margin-top:-10px"> nome cliente</p>
            </li>

            <li class="list-group-item ml-2 mr-3" style="width: 50%; background-color:#e7e7e7; border: none; border-radius: 10px">
                <p style="font-size:15px;color:#8d8d8d; margin-top:-10px">cnpj</p>
            </li>
               
        </div>
        <br>
        <!-- BX1: LINHA 2 -->
        <div class= "d-flex" style="height: 10%">
            <li class="list-group-item ml-0 mr-2" style="width: 100%; border: none; border-radius: 10px">
                <p style="font-size:15px; color:#858585;font-weight: bold; margin-top:-10px">Endereço do cliente</p>
            </li>
               
        </div>
        <div class= "d-flex" style="height: 12%">
            <li class="list-group-item ml-3 mr-3" style="width: 100%; background-color:#e7e7e7; border: none; border-radius: 10px">
                <p style="font-size:15px;color:#8d8d8d; margin-top:-10px"> Endereço</p>
            </li>
               
        </div>
        <br>
        <!-- BX1: LINHA 3 -->
        
        <div class= "d-flex" style="height: 10%">
            <li class="list-group-item ml-0 mr-2" style="width: 25%; border: none; border-radius: 10px">
                <p style="font-size:15px; color:#858585;font-weight: bold; margin-top:-10px">Última visita</p>
            </li>
            <li class="list-group-item ml-0 mr-2" style="width: 25%; border: none; border-radius: 10px">
                <p style="font-size:15px; color:#858585;font-weight: bold; margin-top:-10px">Última pesquisa</p>
            </li>
            <li class="list-group-item ml-0 mr-2" style="width: 25%; border: none; border-radius: 10px">
                <p style="font-size:15px; color:#858585;font-weight: bold; margin-top:-10px">Nome promotor</p>
            </li>
            <li class="list-group-item ml-0 mr-2" style="width: 25%; border: none; border-radius: 10px">
                <p style="font-size:15px; color:#858585;font-weight: bold; margin-top:-10px">Tempo dp último atendimento</p>
            </li>
               
        </div>
        <div class= "d-flex" style="height: 12%">
            <li class="list-group-item ml-3 mr-3" style="width: 25%; background-color:#e7e7e7; border: none; border-radius: 10px">
                <p style="font-size:15px;color:#8d8d8d; margin-top:-10px"> Data</p>
            </li>
            <li class="list-group-item ml-3 mr-3" style="width: 25%; background-color:#e7e7e7; border: none; border-radius: 10px">
                <p style="font-size:15px;color:#8d8d8d; margin-top:-10px"> Data</p>
            </li>
            <li class="list-group-item ml-3 mr-3" style="width: 25%; background-color:#e7e7e7; border: none; border-radius: 10px">
                <p style="font-size:15px;color:#8d8d8d; margin-top:-10px"> Promotor</p>
            </li>
            <li class="list-group-item ml-3 mr-3" style="width: 25%; background-color:#e7e7e7; border: none; border-radius: 10px">
                <p style="font-size:15px;color:#8d8d8d; margin-top:-10px"> Tempo</p>
            </li>
               
        </div>
      
    </div>

    <!-- filtro -->
    <div class="d-flex" style="justify-content: end">
    <li class="list-group-item ml-0 mr-" style="background: none;border: none; border-radius: 10px; text-align: end">
                <p style="font-size:15px; color:#858585;font-weight: bold">Filtro:</p>
            </li>

                <style>
                    .select{
                        background: #e7e7e7;
                        color: #8d8d8d;
                        border-color:#8d8d8d;
                    }   

                </style>
            <select class="select mt-2 mr-3" aria-label="Default select example" style="height: 5vh; border-radius: 10px">
                <option class="option" selected>Periodo de tempo</option>
                <option class="option" value="1">One</option>
                <option class="option" value="2">Two</option>
                <option class="option" value="3">Three</option>
            </select>
    </div>
  


</main>
    @endsection