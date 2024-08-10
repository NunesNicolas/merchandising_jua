<template>
  <div class="header-mobile">
    <p>
        <svg v-if="promotor && promotor.img" viewBox="0 0 250 210" style="height: 20%; width: 20%;">
          <clipPath id="clipCircle">
              <circle cx="90" cy="105" r="86" />
          </clipPath>
          <circle cx="90" cy="105" r="86" fill="none" stroke="grey" stroke-width="3" />
          <image :xlink:href=promotor.img width="200"
              height="200" clip-path="url(#clipCircle)" y="-1" x="-10" />
      </svg>
      <strong v-if="promotor && promotor.nome">{{formatarNome(promotor.nome, 2) }}</strong>
    </p>
    <router-link :to="{ name: 'logout' }">
      <p><strong style="color: red;">Sair</strong></p>
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
  justify-content: space-evenly;
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
  width: auto;
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