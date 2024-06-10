@extends('layouts.app')
@section('title', "{$produto->nome}")

@section('link')
  <link rel="stylesheet" href="{{asset('assets/css/info_style.css')}}">
  <script src="{{asset('assets/js/info_pd.js')}}" defer></script>
@endsection

@section( 'content' )   

<?php
use App\Models\Produto;

$variant2 = new Produto();

$variant3 =new Produto();

$variant4 = new Produto();

foreach ($produtovariants as $variant) {
                if ($variant->weight == 5000) {
                 $variant4 = $variant;
                } elseif ($variant->weight == 1000) {
                  $variant3 = $variant;
                  
                } elseif ($variant->weight == 500) {
                  $variant2 = $variant;
                }
              } 
             
?>

<style>
  
  
</style>


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
      <p class="" style="color:#858585; font-weight: bold; font-size: 2.2vh;"> Dashboard / Produtos / Produto </p>
  </div>

  <div class="d-flex" style="width: 100%; height: 4vh; justify-content:end; padding:35px">
      <a href="{{route('Produtos-index')}}" type="button" class="btn btn-light align-self-center" style="
      border-radius: 20px;
      border:solid #858585 0.2vh;
      color:#858585;
      font-weight: bold;
      font-size:13px
      "> VOLTAR </a>
  </div>
<section class="dark-background">

  <div class="modalEditar">
  <div>
  <p class="tituloModal">Editar Concorrente</p>
    <span class="closeButton" onclick="closeModalEditar()">
      <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16" style="width: 1.5vw; height: 3vh;">
        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
      </svg>
    </span>
    </div>
    <label>Nome do concorrente: </label>
    <input type="text">
    <label>Marca do Produto: </label>
    <select>
      <option value="0">Ype</option>
      <option value="1">Downny</option>
      <option value="2">RT</option>
    </select>
    <label>Situação do Produto: </label>
    <select>
      <option value="0">Ype</option>
      <option value="1">Downny</option>
      <option value="2">RT</option>
    </select>
    <div style="padding: 1vh 1vw; padding-top: 2vh; border-top: solid 0.2vh #858585; ">
      <button class="cancelar">cancelar</button>
      <button class="salvar">Salvar</button>
    </div>
  </div>
</section>


<div class="bodyall" id="bodyallId">
  <div>
    <div class="topDiv" id="conDiv">
      <div style="width: 100%; height: 5vh; justify-content: end; display: flex; padding: 0.5vh;">
        <a class="miniBt" style="color: red; margin-right: 0.5vw;">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
          </svg>
        </a>
        <a class="miniBt" style="color: #2C9AFF;">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
          </svg>
        </a>
      </div>

      <div class="d-flex" style="width: 100%">
      
        <img src="<?php echo $produto->img; ?>" style="width: 15vw; height: 29vh;">
        <div style="display: flex; width: 68vw; height: 30vh; flex-wrap: wrap; align-items: center; justify-content: space-between; padding: 1vh;">
          <label>Nome do produto:</label>
          <p class="inputFachada" style="width: 100%;"> <?php echo $produto->nome; ?> </p>
          <label style="width: 50%"> Preço médio: </label>
          <label style="width: 50%">Quantidade do concorrente:  </label>
          <p class="inputFachada" style="width: 45%;"></p>
          <p class="inputFachada" style="width: 48%;"> {{ count($competitorsthis) }} </p>
        </div>

      </div>
        <div class="divFooter" style="width: 100%">
            <div class="btnPeso">

              <a type="button" class="peso" name="500" ac value="" style="
              <?php 
            if($produto == $variant2) {
                echo "color:#2C9AFF;border-bottom: solid";
              }?>;border-radius: 0vh 0vh 0vh 1vh;" href="{{route('Produtos-info',['id'=> $variant2->id ])}}">500g</button>
             
              <a type="button" class="peso" name="1000"
              style="<?php 
            if($produto == $variant3) {
                echo "color:#2C9AFF;border-bottom: solid";
              }?>" 
              value="" href="{{route('Produtos-info',['id'=> $variant3->id ])}}">1kg</button>
              
              <a type="button" class="peso" style="<?php 
            if($produto == $variant4) {
                echo "color:#2C9AFF;border-bottom: solid";
              }?>"
              name="5000" value="" href="{{route('Produtos-info',['id'=> $variant4->id ])}}">5kg</a>

                

            </div>
              
            <div class="btnPeso" style="display:flex; flex-wrap: wrap; justify-content: end; align-items: center; padding-right: 1vw;">
              <button class="addButton">
                <svg xmlns="http://www.w3.org/2000/svg" width="95%" height="95%" fill=" " class="bi bi-plus-lg" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                  </svg>
                </button>
            </div>
      </div>
    </div>
  </div>

    <div style="width:100%; align-items:left; padding:1%">
    <a href="{{route('Competitors-create')}}" class="btn btn-primary" style="color:#ffffff; font-weight: bold; border-radius:15px">ADICIONAR CONCORRENTE
    </a>
    </div>

   

    {{-- <div class="d-flex" style="width: 100%; height: 5vh; justify-content:end; padding:20px">
      <p class="mr-auto" style="color:#858585; font-weight: bold;"> SEM PRODUTOS CONCORRENTES CADASTRADOS </p>
    </div> --}}

    {{--------------------------------------------------------------------------------}}

       
    
    @if (count($competitorsthis) > 0)

    <div class="d-flex" style="width: 100%; height: 10vh; display:flex; ">
      <p class="d-flex" style=" font-weight: bold; display: flex"> 
        <table class="" style="width: 50%; background-color:; text-align:center">
          
            <th>PRODUTOS</th>
            <th>CONCORRENTES</th>
          
        </table>  
      </p>
    </div>

    @foreach ($competitorsthis as $competitor)    
    <div class="d-flex mb-2" style="
    width: 100%;
    height:10vh;
    display: flex;
    justify-contente;
    border: none;
    align-items: center;
    background-color:#ffffff;
    border-radius:15px;
    "> 

          <table class="" style="text-align: center; color:#858585; width:100%">
                
            <th style="width: 22% ; border-radius:15px 0 0 15px;"> {{$competitor->nome}} </th>
            <th style="width: 22%;"> {{$competitor->brand}} </th>

            <th class="editaBt" style="width:28%">
              <button class="editar-produto-modal" onclick="abrirModalEditar()">Editar produto
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                </svg> 
              </button>
            </th>
            
            
            <th class="detalhesBt">
            <button class="open-modal-buttonDt" id="open-modal">Detalhes <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
              <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5"/>
              <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
            </svg> 
            </button>
            </th>
           
            
          </table>
        </p>
    </div>

    <div id="fade" class="hide">

    <!-- --------------------------MODAL GERAL--------------------- -->
                  <div id="modal" class="hide mt-3">

                  <!-- --------------------------MODAL HEADER--------------------- -->
                    <div id="modal-header" style="text-align: left">
                      <h6 style="font-weight: bold">DETALHES PRODUTO CONCORRENTE</h6>
                      <button class+="close-modal-button"id="close-modal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                      </svg></button>
                    </div>

                  <!-- --------------------------MODAL BODY--------------------- -->
                    <div class="modal-body">
                      <label>Nome do produto:</label>
                      <p class="inputFachada" style="width: 100%;"> <?php echo $competitor->nome; ?> </p>
                      <label style="width: 50%"> Marca: </label>
                      <p class="inputFachada" style="width: 100%;"> <?php echo $competitor->brand; ?></p>
                      <label style="width: 50%">Preço médio:  </label>
                      <p class="inputFachada" style="width: 100%;"> </p>
                      <div class="linha-horizontal">
                      <label style="font-size: 105%">Preço nos nossos clientes</label>
                      </div>
                      <table style="width: 110%">
                        <tr>
                          <td>CLIENTES</td>
                          <td>JUÁ</td>
                          <td>MARCA</td>
                        </tr>
                        <tr style="font-size: 80%">
                          <td>Pedro Lucas Moreira</td>
                          <td>R$ 33,41</td>
                          <td>R$ 32,10</td>
                        </tr>
                      </table>
                      
                    
                    </div>
                  </div>
                </div>
    @endforeach
    @else
    <p>SEM PRODUTOS CONCORRENTES CADASTRADOS</p>
    @endif
    
    
    {{--------------------------------------------------------------------------------}}
    
</div>

  </section>
  
</main>
@endsection