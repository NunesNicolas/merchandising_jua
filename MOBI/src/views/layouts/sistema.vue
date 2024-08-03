<template>
    <div class="page">
        <headerMobile />

        <main>
            <navbar />
            <router-view style=" padding-bottom: 8vh;" :key="$route.fullPath" />
            <div style=" width: 100%;"></div>
        </main>


    </div>
</template>

<script>
import navbar from '../../components/navbar.vue';
import headerMobile from '../../components/headerMobile.vue';
export default {

    components: {
        headerMobile,
    navbar,
}
    
}

</script>

<style>
.page {
    background-color: rgb(246, 246, 246);
    flex-wrap: wrap;
    height: 15vh;
    width: 100%;
    
}
</style>