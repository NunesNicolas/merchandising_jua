<template>
    <i @click="$router.back()" class="bi bi-arrow-left-square icon-right" title="Voltar"></i>
</template>
  
<script>
  export default {
    name: 'ArrowBack'
  };
</script>
  
<style scoped>
.icon-right {
    position: absolute; /* Ajuste conforme necessário */
    right: 10px; /* Ajuste conforme necessário */
    font-size: 28px; /* Tamanho do ícone */
}
</style>