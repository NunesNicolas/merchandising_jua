<script setup>
import axios from "axios";
</script>

<template>

    <div class="page">

        <Breadcrumb pageTitle="Promotores" routeInfo="Dashboard / Promotores" />

        <ActionListWrapper>
            <ActionRouter route="/promotores/create" color="primary" label="Adicionar" />
            <ActionRouterBack />
        </ActionListWrapper>


        <nav id="main-container" style="display: flex; text-align: center; flex-wrap: wrap; gap:50px;">
            <CardList :textBox="true" :items="promotores" :fields="{
                nome: 'Promotor',
                telefone: 'Telefone',
            }">
                <template v-slot:actions="{ item }">
                    <router-link :to="'promotores/' + item.id" class="d-flex flex-wrap">
                       <h5 class="dtbutton">DETALHES</h5>
                    </router-link>
                </template>
            </CardList> 
        </nav>

    </div>

</template>


<script>

import CardList from '../../components/CardIconList.vue';
import Breadcrumb from '../../components/Breadcrumb.vue';
import ActionListWrapper from '../../components/ActionListWrapper.vue';
import ActionRouter from '../../components/ActionRouter.vue';
import ActionRouterBack from "../../components/ActionRouterBack.vue";

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
.dtbutton{
    color: white;
    background-color: rgb(13, 141, 214);
    text-align: center;
    margin-bottom: 0;
    width: 100%;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
}
.li {
    width: 100%;
}
</style>
