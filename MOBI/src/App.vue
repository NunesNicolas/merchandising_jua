<script setup>
import '../axios'
</script>

<template>
  <div class="page">
    <router-view :key="$route.fullPath" />
  </div>
</template>

<script>
import CreateAtendimentos from './views/Pesquisa/Create.vue';
import InicialAuth from './views/auth/login.vue';
import InicialSistema from './views/Pesquisa/Home.vue';
import InicialInfo from './views/Dashboard.vue';
import RegistroHome from './views/RegistroTb/Home.vue';
import Registro from './views/RegistroTb/Create.vue';
import VisitasCheck from './views/PesquisaJua/Create.vue';
import CompetitorsCheck from './views/PesquisaCompetitors/Create.vue';
import Checkin from './views/Checkin.vue';
import CheckoutSucess from './views/CheckoutSucess.vue';
</script>

<style>
button {
  border-radius: 10px;
}
body {
  background-color: (246, 246, 246);
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
