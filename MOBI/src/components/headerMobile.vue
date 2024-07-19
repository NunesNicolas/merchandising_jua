<template>
    <div class="header-mobile">
        <p>
          <svg xmlns="http://www.w3.org/2000/svg" style="height: 3vh; margin-right: 1vw;"  fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
          </svg>
          <strong>User Ipsum</strong>
        </p>
        <router-link :to="{ name: 'dashboard' }">
        <p><strong>Home</strong></p>
      </router-link>
    </div>
</template>
<style scoped>
.header-mobile{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    padding-inline: 2vw;
    padding-block: 1vh;
    width: 100%;
    height: 6vh;
    background-color: #f0f0f0;
    font-size: 2.5vh;
    z-index: 1;
  }
  .header-mobile p{
    flex-wrap: wrap;
    display: flex;
    align-items: center;
  }
</style>