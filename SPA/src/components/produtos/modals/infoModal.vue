
<template>
    <div class="boxAll">
        <div id="modal-header" style="text-align: left">
                        <!-- TOP-MODAL -->
            <h6 style="font-weight: bold; margin-top:-15px;">DETALHES PRODUTO CONCORRENTE</h6>
            <button class="close-modal-button" @click="$emit('toggleModal' ,competitor.id);" :id="competitor.id"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
              <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
            </svg></button>
          </div>

          <div class="modal-body">
            <label>Nome do produto:</label>
            <p class="inputFachada" style="width: 100%;"> {{competitor.nome}} </p>
            <label style="width: 50%"> Marca: </label>
            <p class="inputFachada" style="width: 100%;"> {{competitor.brand}}</p>
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
</template>


<script>
export default{
    data(){   
    },

props: {
    competitor: Array,
   },
   methods: {
    // closeModal(id){
    //   this.modificarEstilo();
    //   this.$emit('toggleModal',{ id });
      
    // }
    
   }
  
}
</script>

<style>
.boxAll{
    position: absolute;
    background-color: white;
    border: 0.2vh solid #d3d6db;
    z-index: 1;
    border-radius: 10px;
    top: 25%;
    left: 65%;
    width: 32%;
    height: auto;
    font-weight: bold;
    color: #808080;
}

#modal-header{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-left: 4%;
    margin-right: 4%;
    margin-top: 4%;
  }
  
.closeButton{
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    width: 3vw;
    background-color: transparent;
    padding: 1vh 0.1vw;
  }

.close-modal-button{
    border: none;
    color: black;
    background-color: white;
    cursor: pointer;
    margin-top: -4%;
  }

  .close-modal-button:hover{
    color: red;
  }

  #modal-body{
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .linha-horizontal{
    width: 100%;
    border-bottom: 2px solid #dadada; 
    margin: 20px auto;
    margin-bottom: 10px;
  }

  .inputFachada{
    height: 7vh; border:none solid #662222; background-color: #e7e7e7; color: #808080; border-radius: 1vh; padding: 1vh; text-align:justify;
}
</style>