<template>
  <button @click="routerbutton('RT')" class="optionBut">
    <i class="bi bi-images iconP"></i><p>Registros de Trabalho</p>
  </button>
  <button @click="routerbutton('RT2')" class="optionBut">
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
        case 'RT2':
          this.$router.push({ name: 'check', params: { pesquisaid: this.$route.pesquisaid } });
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
  background-color: #ffffff;
  border: 1px solid #ebebeb;
  color: #2C9AFF;
  box-shadow: 0vh 0.2vh 0.2vh 0vh #d2d1d1;
  width: 80%;
  height: 10vh;
  margin-top: 3vh;
  margin-left: 10%;
  margin-right: 10%;
}

p{
  font-size: 100%;
    font: bold;
    margin-top: 20px;
}
</style>