<script setup>
import axios from "axios";
</script>

<template>

  <div class="d-flex" style="width: 100%; height: 5vh; justify-content:space-between; padding:10px;">
    <p class="ml-2 mr-auto" style="color:#858585; font-weight: 400 Bold; font-size: 3.2vh;"> Produtos </p>
    <p class="mr-3" style="color:#858585; font-weight: bold; font-size: 2.2vh;"> Dashboard / Produtos </p>
  </div>

  <div class="dash mt-2" style="width: 100%;">

    <div class=" asdadsads d-flex" style="justify-content: space-between; width:100%">

      <div class="bg-white d-flex"
        style="flex-direction: column; justify-content: space-between; width: 23vw; height:20vh; border-radius: 10px; margin: 10px; padding: 1vh; box-shadow: 0vh 0vh 0.1vh 0.1vh #c0c0c0;">
        <div style="display: flex; justify-content: space-evenly; flex-wrap: wrap;">
          <h6 style="text-align:justify; font-weight:400; color:grey; width: 15vw; height: 4vh; font-size: 16px;">
            Periocidade pesquisa juá:</h6>
          <img
            src="https://static.vecteezy.com/ti/vetor-gratis/p1/27153702-ampliacao-vidro-com-relogio-preto-glifo-icone-tempo-monitorando-discar-dentro-lupa-estimativa-e-planejamento-gerir-projeto-silhueta-simbolo-em-branco-espaco-solido-pictograma-isolado-ilustracao-vetor.jpg"
            style="width: 3vw; height: 6vh;">

          <p style="color:#858585; text-align:left; font-weight: bold; font-size: 2.9vh; width: 30vw;"> 25 Dias</p>
        </div>
        <div style="display: flex; justify-content: space-between; width: 100%; align-items: flex-end;">
          <p style="font-size: 15px; text-align:left; font-weight:400; color: blue; margin: 0;">15 dias</p>
          <p style="font-size: 15px; text-align:justify; font-weight:300; margin: 0;">para a próxima pesquisa</p>
        </div>
      </div>


      <div class="bg-white d-flex"
        style=" justify-content: space-evenly; flex-wrap: wrap; width: 20vw; height:20vh; border-radius: 10px; margin: 10px; padding: 1vh; box-shadow: 0vh 0vh 0.1vh 0.1vh #c0c0c0;">
        <h6 style=" width: 13vw; height: 9vh;">Tempo médio de atendimento:</h6>
        <img
          src="https://static.vecteezy.com/ti/vetor-gratis/p1/27153702-ampliacao-vidro-com-relogio-preto-glifo-icone-tempo-monitorando-discar-dentro-lupa-estimativa-e-planejamento-gerir-projeto-silhueta-simbolo-em-branco-espaco-solido-pictograma-isolado-ilustracao-vetor.jpg"
          style="width: 3vw; height: 6vh;">

        <div style="height: 6vh; width: 20vw;"></div>
        <p style="font-size: 1.5vh; width: 20vw; height:3vh;">Tempo medio de atendimento 14/04/2024</p>
      </div>

      <div style="text-align:right; margin-right:10px; align-items: right;" class="bmt-2 ml-auto ">
        <router-link to="/produto/create">
          <div class="mb-2"><a href=""><button class="btn btn-primary"
                style="background-color: #2c9aff; border-radius: 30px; text-align: center; border: none;  font-weight:bold; width: 100%">
                <font color="#ffffff">ADICIONAR PRODUTO</font>
              </button></a></div>
        </router-link>
        <div><button class="btn btn-primary"
            style="background-color: #ffffff; border-radius: 30px; text-align: center; border: solid 2px; color:#bbbbbb;  font-weight:bold">
            <font color="#bbbbbb">CONFIGURAR PERIODICIDADE</font>
          </button></div>
      </div>

    </div>


  </div>

  <!-- CARDS PRODUTOS -->
  <produtosComponents :produtos="produtos" />


</template>


<script>
import produtosComponents from '../../components/produtos/produtosComponents.vue';


export default {

  data() {
    return {
      produtos: []
    };
  },

  methods: {
    async getProdutos() {
      let response = axios.get('/produtos');
      this.produtos = (await response).data.produtos;
    },
  },

  components: {
    produtosComponents
  },

  mounted() {
    this.getProdutos();
  }


}
</script>

<style></style>
