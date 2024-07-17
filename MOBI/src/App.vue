<script setup>
import '../axios'
</script>

<template>
  <div class="page">
    <router-view :key="$route.fullPath" />
  </div>
</template>

<script>
import CreateAtendimentos from './views/RegistroTb/Create.vue';
import InicialAuth from './views/auth/login.vue';
import InicialSistema from './views/PesquisaHome.vue';
import InicialInfo from './views/Dashboard.vue';
import RegistroHome from './views/PesquisaJua/Home.vue';
import Registro from './views/RegistroTb/Home.vue';
import VisitasCheck from './views/PesquisaJua/CheckCamp.vue';
import Checkin from './views/Checkin.vue';
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
