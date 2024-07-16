<template>
    <div style="height: 25vh; width: 100%;">
        <header class="header-empresa">
            <div>
                <h6>Cliente:</h6>
                
                <p>{{ visita}}</p>
                <h6>Endereço:</h6>
                <p>{{ visita}}</p>
                <h6>Tempo de Pesquisa:</h6>
                <p>99h e 99min e 99s</p>
            </div>
            <img src="../assets/nova-logo.png">
        </header>
    </div>
    
</template>

<script>
import axios from 'axios';

export default {
    props:{
        visita: {
            type: Object,
            required: true
        },
    }
}
</script>

<style>
    .header-empresa {
        display: flex;
        flex-wrap: wrap;
        width: 100%;
        height: 24vh;
        background-color: #2C9AFF;
        color: #ffffff;
        align-items: center;
        position: absolute;
        z-index: 1;
    }
    .header-empresa div{
        display: flex;
        flex-wrap: wrap;
        width: 60%;
        height: 100%;
        padding-left: 5vw;
        padding-top: 3vh;
        padding-bottom: 1vh;
        text-align: start;

    }
    .header-empresa img{
        width: 25vw;
        height: 8vh;
        margin-left: 10vw;
        margin-bottom: 12vh;
    }
    .header-empresa div h6{
        width: 100%;
        font-weight: bold;
        padding: 0;
    }
</style>
