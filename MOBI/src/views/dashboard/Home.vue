<script setup>
import axios from "axios";
</script>

<template>

    <div class="page">
        <headerMobile/>
            <div class="info">
                <h5>O que deseja fazer?</h5>
                <OptionButtons/>
            </div>
            <navbar/>
    </div>

</template>

<script>

import headerMobile from '../../components/headerMobile.vue';
import OptionButtons from '../../components/OpitionButtons.vue'
import navbar from '../../components/navbar.vue'

export default {

    components: {
        headerMobile,
        OptionButtons,
        navbar
    },
    
}
</script>


<style>

.page{
    flex-wrap: wrap;
    height:15vh;
    width: 100%;
    background-color: #ffffff;
}
.info{
    text-align: center;
}
.info h5{
    text-align: left;
    color: #a0a0a0;
    font-size: 2.5vh;
    margin-left: 40px;
    margin-top: 50px;
    margin-bottom: 8vh;
}

</style>