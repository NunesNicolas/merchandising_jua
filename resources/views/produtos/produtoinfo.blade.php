@extends('layouts.app')
@section('title', "{$produto->nome}")

@section( 'content' )   

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
    margin-top: 3.8vh;
    background-color: transparent;
    border: none;
    color: #858585;
    border-bottom: 0.1vh solid;
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
          <label> nome do produto:</label>
          <p class="inputFachada" style="width: 67vw;"> <?php echo $produto->nome; ?> </p>
          <label>Preço medio</label>
          <label>Quantidade do concorrente</label>
          <p class="inputFachada" style="width: 32vw;"></p>
          <p class="inputFachada" style="width: 32vw;"></p>
        </div>
        <div class="divFooter">
            <div class="btnPeso">
              <button class="peso" ac value="" style="border-radius: 0vh 0vh 0vh 1vh;">500g</button>
              <button class="peso" value="">1kg</button>
              <button class="peso" value="">5kg</button>
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
    <div class="d-flex" style="width: 100%; height: 5vh; justify-content:end; padding:20px">
      <p class="mr-auto" style=" margin-left: 3vw; color:#858585; font-weight: bold;"> Sem produtos concorrentes cadastrados  </p>
    </div>
  </section>

</main>

@endsection