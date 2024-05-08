@extends('layouts.app')

<style>
  .divSearch{
    display: flex;
    flex-wrap: wrap;
    width: 100%;
    height: 10vh;
    justify-content: end;
    align-items: center;
    padding-inline: 1vw;
  }
  .divSearch input, select{
    height: 5vh;
    border-radius: 1vh;
    font-size: 2.2vh;
    border: none;
    margin-inline: 1vw;
  }
  .divSearch input{
    background-color: #9EDCFF;
    width: 15vw;
  }
  .divSearch input:focus{
    background-color: #fff;
  }
  .divSearch select{
    width: 12vw;
    font-size: 2vh;
  }
  .divSearch p{
    margin-top: 2.5vh;
    font-weight: bold;
    font-size: 2.2vh;
    color:#858585;
  }
  .divSearch select option{
    font-size: 2.2vh;
  }
  
  .divSearch select:after{
    background-color: #c4c4c4;
  }
  table{
    width: 80%;
  }
  table tr th{
    font-size: 2vh;
    color: #858585;
  }
  .indicadores th{
      font-size: 2.2vh;
      color: #000;
      font-weight: bold;
  }
  #infos a{
    font-size: 2.2vh;
    justify-content: center;
    align-items: center;
    text-decoration: none;
    color: #858585;
  }
  #infos a:hover{
    color: #2C9AFF;
  }

</style>
@section('title','criação')
    @section('content')
    <div class="d-flex" style="width: 100%; height: 5vh; justify-content:space-between; padding:10px">
      <p class="ml-4 mr-auto" style="color:#858585; font-weight: bold; font-size: 2.2vh;" > Clientes   </p>
      <p class="mr-3" style="color:#858585; font-weight: bold; font-size: 2.2vh;"> Dashboard / Clientes  </p>
    </div>
    <div class="divSearch">
        <p>Filtros:</p>
        <input type="text" placehorder="Buscar Cliente">
        <select>
          <option value="0">Por promotor</option>
          <option value="1">Cleiton</option>
          <option value="2">Roberto</option>
          <option value="3">Venancio</option>
        <select>
      </div>
    </div>
    <section class="d-flex flex-wrap" style="width: 100%; justify-content: space-evenly; align-items: center;">
      {{-- @foreach ($empresas as $empresas) --}}
          <div class="d-flex flex-wrap content-normal bg-light" id="infos" style="
            width: 95%;
            height: 8vh;
            border-left:
            solid 0.3vw #2C9AFF;
            margin-top: 3vh;
            border-radius: 0.5vh;
            align-items: center;
            justify-content:space-evenly;
            box-shadow: 0vh 0.1vh 0.3vh 0vh #858585;
            ">
            <table>
              <tr class="indicadores">
                <th>CNPJ</th>
                <th>CLIENTE</th>
                <th>PROMOTORES</th>
                <th>ÚLTIMA PESQUISA</th>
                <th>ÚLTIMA VISITA</th>
              </tr>
              <tr>
                <th>3437547647564</th>
                <th>Cariri Center Supermercado - Centro</th>
                <th>Nome do promotor</th>
                <th>06/01/24 às 22:12</th>
                <th>07/02/24 às 10:12</th>
              </tr>
            </table>
            <a href="" class="d-flex flex-wrap">Ver atividade 
              <svg xmlns="http://www.w3.org/2000/svg" style="width: 2vw; height: 4vh;" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5"/>
                <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
              </svg>
            </a>
          </div>
      {{-- @endforeach --}}
    </section>
<script src="script.js"></script>
</main>
    @endsection