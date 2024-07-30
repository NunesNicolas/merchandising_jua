<script setup>
import axios from 'axios';
import { ref, onMounted } from 'vue';
import Navbar from '../../components/header/navbar.vue'; // Certifique-se de importar o componente Navbar corretamente

const user = ref(null);

onMounted(async () => {
      const cachedUser = localStorage.getItem('user');
      
      if (cachedUser) {
        // Se há dados no localStorage, use-os
        user.value = JSON.parse(cachedUser);
      } else {
        // Se não há dados no localStorage, faça uma requisição à API
        try {
          const response = await axios.get('/user');
          user.value = response.data;
          
          // Armazene os dados no localStorage
          localStorage.setItem('user', JSON.stringify(response.data));
        } catch (error) {
          console.error('Erro ao obter dados do usuário:', error);
        }
      }
    });
</script>

<template>
  <div>
    <Navbar :user="user" /> <!-- Passe o objeto 'user' para o componente Navbar -->

    <main id="topheader">
      <nav class="navbar bg-body-tertiary" style="background-color: #ffffff; height: 8vh; width: 100%">
        <a class="ml-auto">
          <img src="https://www.pngall.com/wp-content/uploads/5/Profile-PNG-Pic.png" alt="Perfil"
            style="width:2vw; height: 4vh;">
          <!-- Exibe o nome do usuário se estiver definido -->
          <template v-if="user">
            Olá, {{ user.name }}!
          </template>
        </a>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check"
          viewBox="0 0 16 16">
          <path
            d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
        </svg>
      </nav>
      <router-view :key="$route.fullPath" />
    </main>
  </div>
</template>

<!-- Remova a tag <script> do componente, pois o código está dentro de <script setup> -->

<style scoped>
/* Estilos específicos do componente, se necessário */
</style>
