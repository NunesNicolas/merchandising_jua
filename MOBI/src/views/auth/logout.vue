<template>
  <div>Logging out...</div>
</template>

<script>
export default {
  created() {
    // Apaga o token e o promoter do localStorage
    localStorage.removeItem('token');
    localStorage.removeItem('promoter');
    
    // Redireciona para a página de login
    this.$router.push({ name: 'login' });
  }
};
</script>
