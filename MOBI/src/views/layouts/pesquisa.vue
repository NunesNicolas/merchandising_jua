<template>
    <div class="page">

        <main>
            <navbar />
            <router-view :key="$route.fullPath" />
            <div style=" width: 100%; height: 8vh;"></div>
        </main>


    </div>
</template>

<script>
import navbar from '../../components/navbar.vue';
export default {

    components: {
        navbar,
}
    
}

</script>

<style>
.page {
    flex-wrap: wrap;
    height: 15vh;
    width: 100%;
    background-size: cover;
    background-color: #ffffff;
}
</style>