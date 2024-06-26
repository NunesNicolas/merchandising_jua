<script setup>
import navbar from '../../components/header/navbar.vue'
import axios from "axios";

import {ref, onMounted} from 'vue'

const user = ref();
onMounted(async ()=> {
    const data = await axios.get('http://127.0.0.1:8000/api/user');
    console.log(data);
})
</script>

<template>

    <navbar :user="promotor" />  
      
    <main id="topheader">
      <nav class="navbar bg-body-tertiary" style="background-color: #ffffff; height: 8vh; width: 100%">
        <a class="ml-auto" style="">
          <img src="https://www.pngall.com/wp-content/uploads/5/Profile-PNG-Pic.png" alt="Perfil" style="width:2vw; height: 4vh;">
          Olá, {{promotor.nome}}!
        </a>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
          <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z"/>
        </svg>
      </nav>
      <router-view :key="$route.fullPath" />
      
    </main>
</template>

<script>

export default {
  data(){
    return{
      promotor: {
        id: '',
        nome: ''
      }
    } 
    },

  methods: {
      // async loginVerificar(){
      //   let formData = new FormData();
      //   formData.append('idTransition', this.$route.params.userid);

      //   try {
      //     let response = await axios.post('http://127.0.0.1:8000/api/transition', formData);
      //     this.promotor.id = response.data.userid
      //     this.promotor.nome = response.data.usernome
      //   }catch (error) {
      //     console.error('Erro:', error);
      //     if (error.response && error.response.data && error.response.data.message) {
      //         alert(error.response.data.message);
      //         this.$router.push({name:'login'});
      //     } else {
      //         alert('Ocorreu um erro ao fazer o login.');
      //     }
      //   }
        

      // }
    },

  mounted() { 
    // this.loginVerificar();
  }

  
}
</script>

<style>
</style>