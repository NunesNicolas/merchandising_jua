<template>
    <div class="page">
        <headerMobile />

        <main>
            <navbar />
            <router-view :key="$route.fullPath" />
            <div style=" width: 100%; height: 8vh;"></div>
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
    flex-wrap: wrap;
    height: 15vh;
    width: 100%;
    
}
</style>