<template>
  <nav class="fixed-left">
    <div class="icones" id="navbar">
      <router-link to="/">
        <i class="bi bi-grid-1x2-fill icone"></i>
      </router-link>

      <router-link to="/produtos" active-class="active-icon" :class="{ 'active-icon': isProductRoute }">
        <i class="bi bi-basket2-fill icone"></i>
      </router-link>

      <router-link to="/clientes" active-class="active-icon" :class="{ 'active-icon': isClientRoute }">
        <i class="bi bi-building-fill icone"></i>
      </router-link>

      <router-link to="/promotores" active-class="active-icon" :class="{ 'active-icon': isPromotorsRoute }">
        <i class="bi bi-person-fill icone"></i>
      </router-link>

      <router-link>
        <i class="bi bi-gear-fill icone"></i>
      </router-link>
    </div>
  </nav>
</template>

<script>
export default {
  computed: {
    isProductRoute() {
      return this.$route.path.startsWith('/produtos');
    },
    isClientRoute() {
      return this.$route.path.startsWith('/clientes');
    },
    isPromotorsRoute() {
      return this.$route.path.startsWith('/promotores');
    }
  }
}
</script>

<style scoped>
nav{
width: 5vw; 
height: 100vh;
position: fixed;
z-index: 2;
background-color: #2C9AFF;
}
.icone {
  font-size: 5vh;
  border-radius: 8px;
  border: 2px solid transparent;
  padding-left: 10px;
  padding-right: 10px;
  transition: border-color 0.25s;
}

.icone:hover{
  border-color: white;
  color: #2C9AFF;
  background-color: #ffffff;
}

.active-icon i {
  align-items: center;
  color: #2C9AFF; 
  background-color: white;/* trocar a cor do ícone para rosa */
  border: 3px solid #ffffff; /* adicionar borda vermelha */
  font-size: 5vh;
  border-radius: 8px; 
  border-width: 2px;/* adicionar borda arredondada */
  padding-left: 10px;
  padding-right: 10px;
}

.icones{
  margin-top: 18vh;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
}

.icones a{
  margin-bottom: 6vh;
}

</style>