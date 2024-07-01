<script setup>
import axios from "axios";
</script>

<template>

    <div class="page">

        <Breadcrumb pageTitle="Produtos" routeInfo="Dashboard / Produtos" />

        <ActionListWrapper>
            <ActionRouter route="/produtos/create" color="primary" label="Adicionar" />
            <ActionRouterBack />
        </ActionListWrapper>
        
        <nav id="main-container" style="text-align: center; flex-wrap: wrap; ">
            <div class="d-flex" style="padding: 20px; gap:50px;">
            <CardList :textBox="false" :items="produtos" :fields="{
                nome: 'Produto',
                img: 'img'
                
            }">
                <template class="tp" v-slot:actions="{ item }">
                    <router-link :to="'produtos/' + item.id" class="d-flex flex-wrap mb-3">
                    <div class="dtbutton">
                       <h6 class="mt-2">DETALHES</h6>
                    </div>
                    </router-link>
                    
                </template>
            </CardList> 
        </div>
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
            produtos: [],
        };
    },

    methods: {
        async getProdutos() {
            let response = axios.get('/produtos');
            this.produtos = (await response).data;
        },
    },

    components: {
        CardList
    },

    mounted() {
        this.getProdutos();
    }

}

</script>

<style scoped>
.tp{
    margin-bottom: 15px;
}
.dtbutton{
    color: white;
    background-color: rgb(13, 141, 214);
    text-align: center;
    margin-bottom: 0;
    height: 70%;
    width: 80%;
    border-radius: 10px;
    margin-bottom: 15px;
    margin-left: 10%;
    
    
}
.li {
    width: 100%;
}
</style>
