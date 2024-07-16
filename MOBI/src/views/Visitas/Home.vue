<template>
    <div style="height: 25vh; width: 100%;">
        <headerEmpresa />
    </div>
    
    <h5 class="name">Registro de Trabalho</h5>
    <div>
        <button @click="routebutton(this.$route.pesquisaid)" class="btn">Adicionar Registro
            <i class="bi bi-image"></i>
        </button>

        <RegistroCard/>

    </div>
</template>

<script>
import headerEmpresa from "../../components/headerEmpresa.vue";
import RegistroCard from "../../components/RegistroCard.vue";

export default {
    components: {
        headerEmpresa,
        RegistroCard,
    },
    methods: {
        routebutton(id) {
            this.$router.push({ name: 'newReg', params: { id: id } });
    }
},
}
</script>

<style>
.btn {
    background-color: #f0f0f0;
    box-shadow: 0vh 0.5vh 0.5vh 0.1vh #979797;
    font-weight: bold;
    font-size: medium;
    margin-top: 1vh;
    color: #2C9AFF;
    height: 5vh;
    width: 30vh;
}

.name {
    text-align: left;
    color: #a0a0a0;
    font-size: 2vh;
    margin-left: 2vh;
    margin-top: 2.5vh;
}
</style>
