<script setup>
import axios from "axios";
import { RouterLink } from "vue-router";
</script>

<template>  

  <div class="page">

    <div class="d-flex" style="width: 100%; height: 5vh; justify-content:space-between; padding:10px">
      <p class="ml-4 mr-auto" style="color:#858585; font-weight: bold; font-size: 2.2vh;" > Clientes   </p>
      <p class="mr-3" style="color:#858585; font-weight: bold; font-size: 2.2vh;"> Dashboard / Clientes  </p>
    </div>
    <div class="divSearch">
        <p>Filtros:</p>
        <input type="text" id="input-busca" placehorder="Buscar Cliente">
        <select>
          <option value="0">Por promotor</option>
          <option value="1">Cleiton</option>
          <option value="2">Roberto</option>
          <option value="3">Venancio</option>
        </select>
      </div>
      

      <empresasComponents :empresas="empresas" />
  </div>

        <!-- CARDS EMPRESAS -->
        

            
</template>


<script>
import empresasComponents from '../../components/empresas/empresasComponents.vue';

export default {

data(){
    return {
       empresas: []
    };
},

methods: {
    async getEmpresas(){
    let response =  axios.get('/empresas');
        this.empresas = (await response).data.empresas;
    },
},

components: {
empresasComponents
},

mounted() { 
this.getEmpresas();
}


}

</script>

<style scoped>

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
