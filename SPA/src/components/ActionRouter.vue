<template>
  <router-link :to="route">
    <button :class="['btn', colorClass]"
      style="background-color: #2c9aff; border-radius: 30px; border: none; align-items: center;">
      {{ label }}
    </button>
  </router-link>
</template>

<script>
export default {
  name: 'ActionRouter',
  props: {
    route: {
      type: String,
      required: true
    },
    color: {
      type: String,
      default: 'btn-primary' // cor padrão do botão
    },
    label: {
      type: String,
      required: true
    }
  },
  computed: {
    colorClass() {
      return `btn-${this.color}`; // concatena 'btn-' com a cor para definir a classe do botão
    }
  }
};
</script>

<style scoped>
/* Estilos opcionais específicos do componente */

.btn{
  height: 5.5vh;
  margin-right: 2vh;
  padding-top: 0;
  padding-bottom: 0;
  font-weight: bold;
}
</style>