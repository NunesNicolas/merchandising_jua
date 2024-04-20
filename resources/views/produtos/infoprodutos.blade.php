@extends('layouts.app')

<title> infoprodutos </title>

@section('content')

<style>

</style>
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
    margin-left: 5vw;
">
  <nav class="navbar bg-body-tertiary" style="background-color: #ffffff; height: 8vh;">
      <a class="ml-auto" style="">
        <img src="https://www.pngall.com/wp-content/uploads/5/Profile-PNG-Pic.png" alt="Perfil" style="width:2vw; height: 4vh;">
        Olá, Selso soares!
      </a>
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z"/>
      </svg>
  </nav>
  <section style="
      display: flex;
      flex-wrap: wrap;
      width: 100%;
      justify-content: space-evenly;
      padding-top: 1vh;
      color:#858585; 
      font-weight: bold;
  ">
  <div class="d-flex" style="width: 100%; height: 5vh; justify-content:end; padding:20px">
      <p class="mr-auto" style="color:#858585; font-weight: bold; font-size: 2.2vh;" > Produto  </p>
      <p class="" style="color:#858585; font-weight: bold; font-size: 2.2vh;"> Dashboard / Promotores  </p>
  </div>


  <div class="d-flex" style="width: 100%; height: 4vh; justify-content:end; padding:35px">
      <a href="{{route('index-home')}}" type="button" class="btn btn-light align-self-center" style="
      border-radius: 20px;
      border:solid #858585 0.2vh;
      color:#858585;
      font-weight: bold;
      font-size:13px
      "> VOLTAR </a>
  </div>

    <div class="card" style="width: 20rem; display: flex; border-radius:20px; height: 75vh;">
      <div class="card-body" style="width: 20rem; display: flex; justify-content: center;">
        <svg width="200" height="200">
            <clipPath id="clipCircle">
                <circle cx="100" cy="100" r="70"/>
            </clipPath>
            <circle cx="100" cy="100" r="70" width="200" height="200" fill="none" stroke="grey" stroke-width="3"/>
            <image xlink:href="https://www.pngall.com/wp-content/uploads/5/Profile-PNG-Pic.png" width="200" height="200" clip-path="url(#clipCircle)" />
        </svg>
      </div>
        <ul class="list-group list-group-flush" style="border-radius:20px">
          <li class="list-group-item" style="background: none;border: none">Nome do Promotor:</li>
            <li class="list-group-item" style="background: none;border: none; margin-top:-20px; color:#9FA4ADFF">
              <?php echo $promotor->nome; ?> </li>
          <li class="list-group-item" style="background: none;border: none">Email do Promotor:</li>
            <li class="list-group-item" style="background: none;border: none; margin-top:-20px; color:#9FA4ADFF">
              <?php echo $promotor->email; ?> </li>
          <li class="list-group-item" style="background: none;border: none; border-radius:20px">Status do Promotor:</li>
            <li class="list-group-item" style="background: none;border: none; border-radius:20px; margin-top:-20px; color:#9FA4ADFF">
              <p style="color:red">A DEFINIR</p></li>
        </ul> 
    </div>
    <div class="d-flex" style="
      width: 41vw; 
      height: 50vh; 
      justify-content: space-evenly;
      flex-wrap: wrap;
      padding-top: 2vh;
    ">
      <div class="bg-white d-flex" style=" justify-content: space-evenly; flex-wrap: wrap; width: 20vw; height:20vh; border-radius: 1vh; padding: 1vh; box-shadow: 0vh 0vh 0.1vh 0.1vh #c0c0c0;">
        <h6 style=" width: 15vw; height: 9vh;">Tempo médio de atendimento:</h6>
        <img src="https://cdn.discordapp.com/attachments/1145841372402819143/1229234582977515530/image.png?ex=662ef0ea&is=661c7bea&hm=cbba8302d8813fb5400af32d50008f33a783042805293df5727532541708fda6&" style="width: 4vw; height: 8vh;">
        <div style="height: 6vh; width: 20vw;"></div>
        <p style="font-size: 1.5vh; width: 20vw; height:3vh;">Tempo medio de atendimento 14/04/2024</p>
      </div>
      <div class="bg-white d-flex" style=" justify-content: space-evenly; flex-wrap: wrap; width: 20vw; height:20vh; border-radius: 1vh; padding: 1vh; box-shadow: 0vh 0vh 0.1vh 0.1vh #c0c0c0;">
        <h6 style=" width: 15vw; height: 9vh;">Quantidades de atendimentos no mês:</h6>
        <img src="https://cdn.discordapp.com/attachments/1145841372402819143/1229234815551934635/image.png?ex=662ef122&is=661c7c22&hm=04b32a8707e33c5a32cdef66ab9d12d100e785b90b523bb46d21a160a39b3159&" style="width: 4vw; height: 8vh;">
          <div style="height: 6vh; width: 20vw;"></div>
        <p style="font-size: 1.5vh; width: 20vw; height:3vh;">Tempo medio de atendimento 14/04/2024</p>
      </div>
      <div class="bg-white d-flex" style=" justify-content: space-evenly; flex-wrap: wrap; width: 20vw; height:20vh; border-radius: 1vh; padding: 1vh; box-shadow: 0vh 0vh 0.1vh 0.1vh #c0c0c0;">
        <h6 style=" width: 15vw; height: 9vh;">Pesquisas feitas:</h6>
        <img src="https://cdn.discordapp.com/attachments/1145841372402819143/1229234734639353867/image.png?ex=662ef10e&is=661c7c0e&hm=9d4ccb18d89e5895a2b98f2e54a68942ea38d497bc4cfef505e17dbc197f28a5&" style="width: 4vw; height: 8vh;">
        <div style="height: 6vh; width: 20vw;"></div>
        <p style="font-size: 1.5vh; width: 20vw; height:3vh;">Tempo medio de atendimento 14/04/2024</p>
      </div>
      <div class="bg-white d-flex" style=" justify-content: space-evenly; flex-wrap: wrap; width: 20vw; height:20vh; border-radius: 1vh; padding: 1vh; box-shadow: 0vh 0vh 0.1vh 0.1vh #c0c0c0;">

      </div>
    </div>
    <div class="d-flex bg-white " style="
        flex-wrap: wrap;
        width: 25vw;
        height: 50vh;
        border-radius: 2vh;
        padding: 1vh;
        box-shadow: 0vh 0vh 0.1vh 0.1vh #c0c0c0;
    ">
      <p>Atendimento dos ultimos 30 dias</p>
      <div class="d-flex" style="
          width: 23vw;
          height: 50vh;
          padding: 10vw;
      "> <p>Grafico</p></div>
        <div class="ml-auto">
          <button type="button" class="btn btn-primary" style="border: none;border-radius: 20px; background:#2C9AFF">Adicionar Cliente</button>
        </div>
      </div>

      <div class="d-flex" style="
          width:100%; 
          height:58vh;
          padding:2%;
          justify-content: space-evenly;
          flex-wrap: wrap;
          color:#858585; 
          font-weight: bold;
          
          " >

<div class="d-flex">
          <div style="width: 90vh; height:50vh; background:#ffffff; border-radius:10px; margin-right: 30px; border:darkgray solid 1px; text-align: left;">
            <ul class="list" style="list-style-type:none; padding:5px">
              <li class="list-item"> <p>VISITAS DO PROMOTOR</p> </li>
                <div class="container">
                  <div class="row">
                    <div class="col-sm">
                      CLIENTES
                      <p style="font-size:11px; font-weight:normal ;">Cariri Center Supermercado</p>
                    </div>
                    <div class="col-sm">
                      CHECK-IN
                      <p style="font-size:11px; font-weight:normal ;">06/12/2022 ás 16:20</p>
                    </div>
                    <div class="col-sm">
                      CHECK-OUT
                      <p style="font-size:11px; font-weight:normal ;">06/12/2022 ás 17:20</p>
                    </div>
                  </div>
                </div>
            </ul>
          </div>


          <div class="container" style="width: 90vh; height:50vh; background:#ffffff; border-radius:10px; border:darkgray solid 1.2px; text-align:left;">
            <ul class="list" style="list-style-type:none; padding:5px">
              <li class="list-item d-flex" style="justify-content: space-between">  <p style="text-align:initial"> ROTEIRO DO PROMOTOR </p> <a class="mt-1" style=""> <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#2C9AFF" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
              </svg> </a>  </li>
                <div class="container">
                  <div class="row">
                    <div class="col-sm">
                      CNPJ
                      <p style="font-size:11px; font-weight:normal ;">30.058.107/0001-51</p>
                    </div>
                    <div class="col-sm">
                      CLIENTE
                      <p style="font-size:11px; font-weight:normal ;">Cariri Center Supermercados</p>
                    </div>
                    <div class="col-sm">
                      ÚLTIMA VISITA <a class="" style="align-content: end"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                        <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5"/>
                        <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                      </svg> </a>
                      <p style="font-size:11px; font-weight:normal ;">06/12/2022 ás 16:20</p>
                    </div>
                  </div>
                </div>
            </ul>
          </div>
        </div>
      </div>

  </section>
</main>
    
@endsection