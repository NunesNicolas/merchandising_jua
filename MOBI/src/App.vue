<script setup>
import '../axios'
</script>

<template>
  <div class="page">
    <router-view :key="$route.fullPath" />
  </div>
</template>

<script>
import InicialAuth from './views/auth/inicial.vue';
import InicialSistema from './views/dashboard/inicial.vue';
</script>

<style scoped>
body {
  background-color: #f0f0f0;
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
