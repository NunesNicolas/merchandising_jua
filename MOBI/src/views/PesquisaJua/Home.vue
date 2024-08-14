<template>
  <div style="height: 25vh; width: 100%">
    <headerEmpresa :visita="pesquisa" />
  </div>

  <h5 class="name">Registros de Trabalho</h5>
  <div>
    <button @click="routebutton(this.$route.pesquisaid)" class="btn">
      Adicionar Registro
      <i class="bi bi-image"></i>
    </button>

    <RegistroCard/>
  </div>
</template>

<script>
import headerEmpresa from "../../components/headerEmpresa.vue";
import RegistroCard from "../../components/RegistroCard.vue";
import axios from 'axios';

export default {
  
  data() {
    return {
      id: this.$route.params.pesquisaid,
      pesquisa: {}
    }
  },
  components: {
    headerEmpresa,
    RegistroCard,
  },
  methods: {
    async fetchPesquisa() {
      let response = axios.get('/pesquisas/' + this.id)
      this.pesquisa = (await response).data;
      console.log('Dados da pesquisa:', this.pesquisa);
    },

    routebutton(id) {
      this.$router.push({ name: 'newReg', params: { id: id } });
    }
  },
  mounted() {
    this.fetchPesquisa();
  }
}
</script>

<style>
.btn {
  background-color: #f0f0f0;
  box-shadow: 0vh 0.5vh 0.5vh 0.1vh #979797;
  font-weight: bold;
  font-size: medium;
  margin-top: 1vh;
  color: #2c9aff;
  height: 5vh;
  width: 30vh;
}

.name {
  text-align: left;
  color: #a0a0a0;
  font-size: 2vh;
  margin-left: 2vh;
  margin-top: 2.5vh;
}
</style>
