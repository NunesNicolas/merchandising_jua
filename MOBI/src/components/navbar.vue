<template>
    <nav class="navbar-mobile">
      <div class="img">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-grid-1x2-fill" viewBox="0 6 16 16">
          <path d="M0 1a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm9 0a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1zm0 9a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1z"/>
        </svg>  
  
        <router-link to="">
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-grid-1x2-fill" viewBox="0 0 16 16">
            <path d="M5.929 1.757a.5.5 0 1 0-.858-.514L2.217 6H.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h.623l1.844 6.456A.75.75 0 0 0 3.69 15h8.622a.75.75 0 0 0 .722-.544L14.877 8h.623a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1.717L10.93 1.243a.5.5 0 1 0-.858.514L12.617 6H3.383zM4 10a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0zm3 0a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0zm4-1a1 1 0 0 1 1 1v2a1 1 0 1 1-2 0v-2a1 1 0 0 1 1-1"/>
          </svg>
        </router-link>
  
        <router-link to=""> 
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-grid-1x2-fill" viewBox="0 0 16 16">
            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
          </svg>
        </router-link>
      </div>
      </nav>
</template>
<style>
.navbar-mobile{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
    align-items: center;
    background-color: #2C9AFF;
    width: 100%;
    height: 8vh;
    margin-top: 80vh;
}

.img{
  display: flex;
  justify-content: space-evenly;
  align-items: center;
  width: 100%;
  color: white;
}
.img svg{
  height: 10vh;
  width: 8vw;
}

</style>