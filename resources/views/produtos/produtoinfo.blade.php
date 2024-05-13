@extends('layouts.app')
@section('title', "{$produto->nome}")
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
  .inputFachada{
     height: 7vh; border:none solid #c0c0c0; background-color: #e7e7e7; color: #808080; border-radius: 1vh; padding: 1vh; text-align:justify;
  } 
  label{
    color:#858585;
    font-size: 2vh;
    height: 3vh;
    width: 32vw;
    padding: 1vh;
  }
  .divFooter{
    width: 100%;
    height:9vh;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: end;
    border-top: 0.2vh solid #d3d6db;
  }
  .btnPeso{
    width: 30vw;
    height: 11vh;
    border: none;
  }
  
  .peso{
    width: 5vw;
    height: 7vh;
    text-aling:center;
    margin-top: 3.8vh;
    background-color: transparent;
    border: none;
    color: #858585;
    border-bottom: 0.1vh solid;
    text-align: center;
  }

  .peso:visited {
    color: #858585;
  }

  .peso:hover{
    border-bottom:solid #2C9AFF;
  }
  .peso:active{
    border-bottom: #2C9AFF;
    text-color: blue;
  }
  .addButton{
    width: 2.5vw;
    height: 5vh;
    background-color: transparent;
    border-radius: 0.5vh;
    border: 0.1vh solid #858585;
    color: #858585;
  }
  .addButton:hover{
    border: 0.1vh solid #2C9AFF;
    color: #2C9AFF;
  }
  a:visited {
    color: purple;
  }
  .miniBt{
    cursor: pointer;
  }
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

  <div>
    <div class="d-flex" style="
      border: 0.2vh solid #d3d6db;
      width: 85vw;
      height: 50vh;
      border-radius: 1vh;
      background-color:#ffffff;
      flex-wrap: wrap;
      justify-content: space-evenly;
    ">
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
        <img src="<?php echo $produto->img; ?>" style="width: 15vw; height: 29vh;">
        <div style="display: flex; width: 68vw; height: 30vh; flex-wrap: wrap; align-items: center; justify-content: space-between; padding: 1vh;">
          <label>Nome do produto:</label>
          <p class="inputFachada" style="width: 67vw;"> <?php echo $produto->nome; ?> </p>
          <label>
            Preço médio: 
          </label>
          <label>Quantidade do concorrente:  </label>
          <p class="inputFachada" style="width: 32vw;"></p>
          <p class="inputFachada" style="width: 32vw;"> {{ count($competitorsthis) }} </p>
        </div>
        <div class="divFooter">
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
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill=" " class="bi bi-plus-lg" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                  </svg>
                </button>
            </div>
        </div>
    </div>
   </div>

    <div style="width:100%; align-items:left; padding:1%; margin-left:8vh">
    <a href="{{route('Competitors-create')}}" class="btn btn-primary" style="color:#ffffff; font-weight: bold; border-radius:15px">ADICIONAR CONCORRENTE
    </a>
    </div>

   

    {{-- <div class="d-flex" style="width: 100%; height: 5vh; justify-content:end; padding:20px">
      <p class="mr-auto" style=" margin-left: 3vw; color:#858585; font-weight: bold;"> SEM PRODUTOS CONCORRENTES CADASTRADOS </p>
    </div> --}}

    {{--------------------------------------------------------------------------------}}

       
    
    @if (count($competitorsthis) > 0)

    <div class="d-flex" style="width: 100%; height: 10vh; display:flex; ">
      <p class="d-flex" style=" margin-left: 4.5vw; font-weight: bold; display: flex"> 
        <table class="" style="width: 50%; background-color:; text-align:center">
          
            <th class="" style="width:">PRODUTOS</th>
            <th style="width:">CONCORRENTES</th>
          
        </table>  
      </p>
    </div>

    @foreach ($competitorsthis as $competitor)    
    <div class="d-flex mb-2" style="
    width: 90%;
    height:10vh;
    display: flex;
    justify-contente;
    border: none;
    align-items: center;
    background-color:#ffffff;
    border-radius:15px;
    "> 

          <table class="" style="text-align: center; color:#858585; width:100% ">
                
            <th style="width: 20% ; border-radius:15px 0 0 15px;"> {{$competitor->nome}} </th>
            <th style="width: 20%"> {{$competitor->brand}} </th>

            <th style="width:20%">Editar produto <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
            </svg> </th>
            
            <th style="width:20% ; border-radius:0 15px 15px 0;">Detalhes <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
              <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5"/>
              <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
            </svg> </th>
            
          </table>
        </p>
    </div>
    @endforeach
    @else
    <p>SEM PRODUTOS CONCORRENTES CADASTRADOS</p>
    @endif
    
    
    {{--------------------------------------------------------------------------------}}
    
    
  </section>

</main>
@endsection