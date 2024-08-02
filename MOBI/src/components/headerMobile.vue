<template>
  <div class="header-mobile">
    <p>
      <svg xmlns="http://www.w3.org/2000/svg" style="height: 3vh; margin-right: 1vw;" fill="currentColor"
        class="bi bi-person-fill animate-pulse" viewBox="0 0 16 16">
        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
      </svg>
      <strong v-if="promotor && promotor.nome">{{formatarNome(promotor.nome, 2) }}</strong>
    </p>
    <router-link :to="{ name: 'dashboard' }">
      <p><strong>Home</strong></p>
    </router-link>
    <router-link :to="{ name: 'logout' }">
      <p><strong>Sair</strong></p>
    </router-link>
  </div>
</template>
<script>
export default{
  data() {
    return {
      promotor: Object,
    }
  },
  methods: {
    iniciar(){
      this.promotor = JSON.parse(localStorage.getItem('promoter'));
  },
  formatarNome(nome, limite) {
    const palavras = nome.split(' ');
    return palavras.slice(0, limite).join(' ');
  }
  },
  mounted() {
    this.iniciar();
    }
}
</script>
<style scoped>
.header-mobile {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: center;
  padding-inline: 2vw;
  padding-block: 1vh;
  width: 100%;
  height: 6vh;
  background-color: #f0f0f0;
  font-size: 2.5vh;
  z-index: 1;
  overflow: hidden;
  animation-name: startAnimation;
  animation-duration: 1s;
}

.header-mobile p {
  flex-wrap: wrap;
  display: flex;
  align-items: center;
}

@keyframes startAnimation {
  0% {
    height: 0vh;
  }

  ;

  100% {
    height: 6vh;
  }
}
</style>