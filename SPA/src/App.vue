<script setup>
import '../axios'
</script>

<template>
  <div class="page">
    <router-view :key="$route.fullPath" />
  </div>
</template>

<script>
import homeProdutos from './views/produtos/Home.vue';
import InfoProdutos from './views/produtos/Show.vue';
import createProdutos from './views/produtos/Create.vue';
import homePromotores from './views/promotores/Home.vue';
import infoPromotores from './views/promotores/Show.vue';
import createPromotores from './views/promotores/Create.vue';
import homeEmpresas from './views/empresas/homeEmpresas.vue';
import infoEmpresas from './views/empresas/InfoEmpresas.vue';

import HomeClientes from './views/clientes/Home.vue';
import CreateClientes from './views/clientes/Create.vue';
import UpdateClientes from './views/clientes/Update.vue';



</script>

<style>
body {
  background-color: rgb(5, 180, 255);
}

.page {
  padding: 0%;
  margin: 0%;
  justify-content: space-between;
  height: 100%;
  min-height: 100vh;
}

#app {
  padding: 0%;
  margin: 0%;
}

#topheader {
  padding-bottom: 2px;
  background-color: #f0f0f0;
  height: 100%;
  width: 94.95%;
  margin-left: 5vw;
  border: none;
}
</style>