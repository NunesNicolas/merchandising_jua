<script setup>
import '../axios'
</script>

<template>
  <div class="page">
    <router-view :key="$route.fullPath" />
  </div>
</template>

<script>
import CreateAtendimentos from './views/Atendimentos/Create.vue';
import InicialAuth from './views/auth/login.vue';
import InicialSistema from './views/dashboard/Home.vue';
import InicialInfo from './views/dashboard/Show.vue';
import VisitasHome from './views/Visitas/Home.vue';
import Registro from './views/Visitas/Registros.vue';
import VisitasCheck from './views/Visitas/CheckCamp.vue';
</script>

<style scoped>
body {
  background-color: #ff0000;
}
#app {
  padding: 0;
  margin: 0;
  

}
.page {
  padding: 0;
  margin: 0;
  height: 100vh;
  width: 100%;
  min-height: 100vh;
  padding-bottom: 10vh;
}


</style>
