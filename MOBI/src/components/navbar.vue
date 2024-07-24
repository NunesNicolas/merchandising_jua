<template>
  <div class="bottomSpace">
    <nav class="navbar-mobile">
      <router-link :to="{ name: 'dashboard' }" active-class="active-icon">
        <i class="bi bi-grid-1x2-fill icone"></i>
      </router-link>

      <router-link to="">
        <i class="bi bi-basket2-fill icone"></i>
      </router-link>

      <router-link to="">
        <i class="bi bi-building-fill icone"></i>
      </router-link>
    </nav>
  </div>
</template>
<style>

.icone {
  font-size: 200%;
}

.active-icon i {
  color: #2C9AFF; 
  background-color: white;/* trocar a cor do ícone para rosa */
  border: 3px solid #ffffff; /* adicionar borda vermelha */
  font-size: 220%;
  border-radius: 8px; 
  border-width: 2px;/* adicionar borda arredondada */
  padding-left: 10px;
  padding-right: 10px;
}

.navbar-mobile {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-evenly;
  align-items: center;
  background-color: #2C9AFF;
  width: 100%;
  height: 8vh;
  position: fixed;
  padding: 0;
  bottom: 0;
  color: #ffffff;
  z-index: 1;
}

.navbar-mobile a {
  width: 8vw;
  margin: 0;
  color: #ffffff;
}
</style>