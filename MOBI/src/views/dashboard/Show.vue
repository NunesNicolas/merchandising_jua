<script setup>
import axios from "axios";
</script>

<template>

    <div class="page">
            <div class="info">
                <h5>Roteiro de Clientes</h5>
                <VisitasCard/>
            </div>
    </div>

</template>

<script>


import VisitasCard from '../../components/VisitasCard.vue'


export default {

    components: {
        VisitasCard,
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
    justify-content: space-evenly;
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