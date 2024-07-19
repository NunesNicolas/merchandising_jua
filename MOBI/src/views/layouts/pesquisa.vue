<template>
    <div class="page">

        <main>
            <navbar />
            <router-view :key="$route.fullPath" />
            <div style=" width: 100%; height: 8vh;"></div>
            <SaveAndCancel/>
        </main>


    </div>
</template>

<script>
import navbar from '../../components/navbar.vue';
import SaveAndCancel from '../../components/SaveAndCancel.vue';
export default {

    components: {
        navbar,
        SaveAndCancel,
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
.butArea{
    box-shadow: 0.0vh 0.0vh 0.9vh 0.0vh #979797;
    background-color: #D9D9D9;
}
</style>