<script setup>
import '../axios'
</script>

<template>
  <div class="page">
    <headerMobile/>
    <navbar/>
    <router-view :key="$route.fullPath" />
  </div>
</template>

<script>
import headerMobile from "./components/headerMobile.vue";
import navbar from './components/navbar.vue';
import InicialAuth from './views/auth/login.vue';
import InicialSistema from './views/dashboard/Home.vue';
import InicialInfo from './views/dashboard/Show.vue';

components: {
        headerMobile,
        navbar
    }

</script>

<style scoped>
body {
  background-color: #ff0000;
}

.page {
  padding: 0;
  margin: 0;
  height: 100vh;
  width: 100%;
  min-height: 100vh;
}

#app {
  padding: 0;
  margin: 0;
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
