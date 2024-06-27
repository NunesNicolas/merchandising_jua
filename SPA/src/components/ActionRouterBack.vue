<template>
  <a @click="$router.go(-1)" type="button" class="btn btn-light align-self-center" style="
        border-radius: 20px;
        border:solid #858585 0.2vh;
        color:#858585;
        font-weight: bold;
        font-size:13px
        "> Voltar
  </a>
</template>

<script>
export default {
  name: 'ActionRouterBack',
  props: {
    label: {
      type: String,
      required: true
    }
  }
};
</script>

<style scoped>
/* Estilos opcionais específicos do componente */
</style>