<template>
    
    <div class="d-flex" style="width: 100%; height: 10vh; display:flex; ">
        <p class="d-flex" style=" font-weight: bold; display: flex"> 
          <table class="" style="width: 40%; background-color: none; text-align:end">
            
              <th>PRODUTOS</th>
              <th>CONCORRENTES</th>
            
          </table>  
        </p>
    </div>
  
  <div class="modalContainer" v-for="competitor in competitors" :key="competitor.id">
    <div class="cardCompetitors"> 

          <table class="" style="text-align: center; color:#858585; width:100%">
                
            <th style=" border-radius:15px 0 0 15px;">{{competitor.nome}}</th>
            <th class="">{{competitor.brand}}</th>

            <th class="">
              <button class="editar-produto-modal" onclick="abrirModalEditar()">Editar produto
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                </svg> 
              </button>
            </th>
            
            
            <th id="" class="detalhesBt">
            <button class="open-modal-buttonDt" style="font-weight: bold;" @click="toggleModal(competitor.id);" :id= competitor.id> Detalhes  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
              <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5"/>
              <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
            </svg> 
            </button>
            </th>
          </table>
    </div>

    <infoModal @modificarEstilo="modificarEstilo" @toggleModal="toggleModal" :id=competitor.id v-if="modalAberta == competitor.id" :competitor="competitor"></infoModal>

  </div>
    
  
</template>

<script>
import infoModal from '../../components/produtos/modals/infoModal.vue';
import editarProdutoModal from '../../components/produtos/modals/editarProdutoModal.vue';
export default {
   name: 'CompetitorsComponents',
  data(){
    return{ modalAberta: '0',
          }
  },
   props: {
    competitors: Array,
    
   },


methods: {
  toggleModal(id){
    if (this.modalAberta == id) {
      this.modalAberta = 0;
      this.$emit('modificarEstilo');
    }
    else {
      if(this.modalAberta == 0){
      this.$emit('modificarEstilo');
    }
    this.modalAberta = id;
  }
  
  },

  
// openModalButtons: forEach((button) => {
//     button.addEventListener("click", toggleModal);
//     closeModalButton.addEventListener("click", toggleModal);
// }),
},
components: {
    infoModal
  },
}
</script>


<style>


.cardCompetitors{
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  width: 93%;
  height:10vh;
  display: flex;
  border: none;
  align-items: center;
  background-color:#ffffff;
  border-radius:15px;
  margin-bottom: 5vh;
  font-size: 74%;
}
#contentCompetitors{
    width: auto;
    text-align: start;
}
.cardCompetitors table{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-evenly;
  align-items: center;
}
.cardCompetitors table th{
  width: 23%;
  display: flex;
  justify-content: center;
  padding: 0.5vh 0.5vw;
}
.cardCompetitors table th button{
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  padding: 0;
  margin: 0;
  padding-block: 0.5vh;
  padding-inline: 0.1vw;
}
.open-modal, .editar-produto-modal{
    background-color: #ffff;
    border-radius:15px;
    border: white;
    font-weight: bold;
    color: #858585;
    border: none;
    display: flex;
    cursor: pointer;
    opacity: .9;
    transition: 0.4s;
}
.editar-produto-modal{
  width: 62%;
}
.open-modal-buttonDt{
  background-color: white;
  color: #858585;
  width: 50%;
  
}
.open-modal-buttonDt:hover{
  border: none;
  color: #2C9AFF;
}
  
.open-modal:hover, .open-modal:active, .editar-produto-modal:hover{
    color: #2C9AFF;
    border: none;
    opacity: 1;
}

.open-modal:active{
    border: none;
    color: #2C9AFF;

}

#close-modal:hover{
    color: red;
}

</style>