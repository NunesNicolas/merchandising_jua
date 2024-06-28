<script setup>
import axios from "axios";
</script>

<template>

    <div class="page">

        <div class="d-flex" style="width: 100%; height: 5vh; justify-content:space-between; padding:10px">
            <p class="ml-4 mr-auto" style="color:#858585; font-weight: bold; font-size: 2.2vh;"> Promotores </p>
            <p class="mr-3" style="color:#858585; font-weight: bold; font-size: 2.2vh;"> Dashboard / Promotores </p>
        </div>

        <div style='text-align: right; margin-right:' class="mt-2 ml-auto">
            <router-link to="/promotores/create">
                <button class="btn btn-primary"
                    style="background-color: #2c9aff; border-radius: 30px; margin-right: 42px; text-align: right; border: none;">
                    <font color="#ffffff">Adicionar Promotor</font>
                </button>
            </router-link>
        </div>

        <nav id="main-container" style="display: flex; text-align: center; flex-wrap: wrap; gap:50px;">
            <CardList :items="promotores" :fields="{
                nome: 'Promotor',
                telefone: 'Telefone',
                // ultima_pesquisa: 'ÚLTIMA PESQUISA',
                // ultima_visita: 'ÚLTIMA VISITA'
            }" />
        </nav>

    </div>

</template>


<script>

import CardList from '../../components/CardIconList.vue';

export default {

    data() {
        return {
            promotores: [],
        };
    },

    methods: {
        async getPromotores() {
            let response = axios.get('/promotores');
            this.promotores = (await response).data;
        },
    },

    components: {
        CardList
    },

    mounted() {
        this.getPromotores();
    }

}

</script>

<style scoped>
.li {
    width: 100%;
}
</style>
