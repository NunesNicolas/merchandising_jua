<template>
  <button @click="routerbutton('RT')" class="optionBut">
    <i class="bi bi-images iconP"></i><p>Registros de Trabalho</p>
  </button>
  <button class="optionBut">
    <i class="bi bi-search iconP"></i> <p>Pesquisa Juá</p> 
  </button>
  <button class="optionBut">
    <i class="bi bi-search iconP"></i><p>Pesquisa de Concorrentes</p>
  </button>
</template>
<script>
export default {
  methods: {
    routerbutton(route) {
      switch (route) {
        case 'RT':
          this.$router.push({ name: 'registro', params: { pesquisaid: this.$route.pesquisaid } });
          break;

        default:
          break;
      }
    },
  }
}
</script>
<style scoped>
.iconP {
  font-size: 200%;
  margin-right: 30px;
  margin-top: 8px;
}

.optionBut {
  display: flex;
  text-align: start;
  background-color: #f0f0f0;
  color: #2C9AFF;
  width: 80%;
  height: 10vh;
  margin-top: 3vh;
  margin-left: 10%;
  margin-right: 10%;
  box-shadow: 0vh 0vh 0.5vh 0.1vh #979797;
}

p{
  font-size: 100%;
    font: bold;
    margin-top: 20px;
}
</style>