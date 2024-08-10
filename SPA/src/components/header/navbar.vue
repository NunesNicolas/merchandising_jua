<template>
<nav class="fixed-left" style="
   
">
    <div class="d-flex flex-row flex-wrap" style="width: 5vw; height:50vh; justify-content: center;">
        <!-- <a href="" class="btnav" class="border-collapse" style="display: flex; justify-content: center; width: 4vw;  height: 8vh; padding-top: 1vh; border-radius: 1vh;"> -->
          <router-link class="botao">
            <i class="bi bi-grid-1x2-fill icone"></i>   
          </router-link>   
<!-- </a> -->
        <!-- <a href="{{route('Produtos-index')}}" class="btnav" class="border-collapse-" style="display: flex;justify-content: center; width: 4vw;  height: 8vh; padding-top: 1vh; border-radius: 1vh;"> -->
          <router-link class="botao" to="/produtos" active-class="active-icon">
            <i class="bi bi-basket2-fill icone"></i>
          </router-link>
        <!-- </a> -->
        <!-- <a href="{{route('Empresas-index')}}" class="btnav" class="border-collapse-" style="display: flex;justify-content: center; width: 4vw;  height: 8vh; padding-top: 1vh; border-radius: 1vh;"> -->
          <router-link class="botao" to="/clientes" active-class="active-icon"> 
            <i class="bi bi-building-fill icone"></i>
          </router-link>
        <!-- </a> -->
        <!-- <a href="{{route('Promotores-home')}}" class="border-collapse-" class="btnav" style="display: flex;justify-content: center; width: 4vw;  height: 8vh; padding-top: 1vh; border-radius: 1vh;"> -->
          <router-link class="botao" to="/promotores" active-class="active-icon">
            <i class="bi bi-person-fill icone"></i>
          </router-link>

        <!-- </a> -->

        <!-- <a href="" class="border-collapse-" style="display: flex;justify-content: center; width: 4vw;  height: 8vh; padding-top: 1vh; border-radius: 1vh;"> -->
            <svg xmlns="http://www.w3.org/2000/svg" style="color: white; width: 3vw;  height: 6vh;" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
              <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
            </svg>
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
  font-size: 240%;
  border-radius: 8px;
  border: 2px solid transparent;
  padding-left: 10px;
  padding-right: 10px;
  transition: border-color 0.25s;
}

.icone:hover{
  border-color: white;
}

.active-icon i {
  align-items: center;
  color: #2C9AFF; 
  background-color: white;/* trocar a cor do ícone para rosa */
  border: 3px solid #ffffff; /* adicionar borda vermelha */
  font-size: 240%;
  border-radius: 8px; 
  border-width: 2px;/* adicionar borda arredondada */
  padding-left: 10px;
  padding-right: 10px;
}
</style>