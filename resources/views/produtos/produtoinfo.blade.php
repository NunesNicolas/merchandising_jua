@extends('layouts.app')
@section('title','1')

@section( 'content' )   

<style>
  .inputFachada{
     height: 7vh; border: 0.1vh solid #c0c0c0; background-color: #d3d3d3; color: #808080; border-radius: 0.5vh; padding: 1vh;
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
    border-top: 0.2vh solid #808080;
  }
  .btnPeso{
    width: 30vw;
    height: 11vh;
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
  }
  .addButton{
    width: 4vw;
    height: 7vh;
    background-color: transparent;
    border-radius: 0.5vh;
    border: 0.1vh solid #858585;
    color: #858585;
  }
  .addButton:hover{
    border: 0.1vh solid #2C9AFF;
    color: #2C9AFF;
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
      <a href="" type="button" class="btn btn-light align-self-center" style="
      border-radius: 20px;
      border:solid #858585 0.2vh;
      color:#858585;
      font-weight: bold;
      font-size:13px
      "> VOLTAR </a>
  </div>

  <div>
    <div class="d-flex" style="
      border: 0.2vh solid #000;
      width: 85vw;
      height: 43vh;
      border-radius: 1vh;
      flex-wrap: wrap;
      justify-content: space-evenly;
    ">
        <img src="" style="width: 15vw; height: 29vh; margin-top: 1vh;">
        <div style="display: flex; width: 68vw; height: 30vh; flex-wrap: wrap; align-items: center; justify-content: space-between; padding: 1vh;">
          <label>Nome do Produto</label>
          <p class="inputFachada" style="width: 67vw;"> Produto</p>
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
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                  </svg>
                </button>
            </div>
        </div>
    </div>
   </div>
    <></>
    <div class="d-flex" style="width: 100%; height: 5vh; justify-content:end; padding:20px">
      <p class="mr-auto" style=" margin-left: 3vw; color:#858585; font-weight: bold;"> Sem produtos concorrentes cadastrados  </p>
    </div>
  </section>
</main>
@endsection