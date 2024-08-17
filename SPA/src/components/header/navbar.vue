<template>
<nav class="fixed-left">
    <div class="d-flex flex-row flex-wrap" style="width: 5vw; height:50vh; justify-content: center;" id="navbar">
        <!-- <a href="" class="btnav" class="border-collapse" style="display: flex; justify-content: center; width: 4vw;  height: 8vh; padding-top: 1vh; border-radius: 1vh;"> -->
          <router-link>
            <i class="bi bi-grid-1x2-fill icone"></i>
          </router-link>   
<!-- </a> -->
        <!-- <a href="{{route('Produtos-index')}}" class="btnav" class="border-collapse-" style="display: flex;justify-content: center; width: 4vw;  height: 8vh; padding-top: 1vh; border-radius: 1vh;"> -->
          <router-link to="/produtos" active-class="active-icon">
            <i class="bi bi-basket2-fill icone"></i>
          </router-link>
        <!-- </a> -->
        <!-- <a href="{{route('Empresas-index')}}" class="btnav" class="border-collapse-" style="display: flex;justify-content: center; width: 4vw;  height: 8vh; padding-top: 1vh; border-radius: 1vh;"> -->
          <router-link to="/clientes" active-class="active-icon"> 
            <i class="bi bi-building-fill icone"></i>
          </router-link>
        <!-- </a> -->
        <!-- <a href="{{route('Promotores-home')}}" class="border-collapse-" class="btnav" style="display: flex;justify-content: center; width: 4vw;  height: 8vh; padding-top: 1vh; border-radius: 1vh;"> -->
          <router-link to="/promotores" active-class="active-icon">
            <i class="bi bi-person-fill icone"></i>
          </router-link>

        <!-- </a> -->

        <!-- <a href="" class="border-collapse-" style="display: flex;justify-content: center; width: 4vw;  height: 8vh; padding-top: 1vh; border-radius: 1vh;"> -->
          <router-link>
            <i class="bi bi-gear-fill icone"></i>
          </router-link>
        <!-- </a> -->
    </div>
</nav>
</template>

<script>
</script>

<style scoped>
nav{
padding-top: 20vh;
width: 5vw;
height: 100vh;
position: fixed;
z-index: 2;
justify-content: spacy-evenly;
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
</style>