<script setup>
import axios from "axios";
</script>

<template>

    <div class="page">

        <Breadcrumb pageTitle="Produtos" routeInfo="Dashboard / Produtos" />

        <ActionListWrapper>
            <ActionRouter route="/produtos/Create" color="primary" label="Adicionar" />
            <ActionRouterBack />
        </ActionListWrapper>

        <nav id="main-container" style="text-align: center; ">
            <div class="d-flex" style="padding: 20px; gap:50px; flex-wrap: wrap; ">
                <div v-for="produto in produtos" :key="produto.id" class="card-container"
                    style="display: flex; width: 13vw;">
                <CardList :textBox="true" :item="produto" :fields="{
                    nome: 'Produto',
                }">
                    <template class="tp" v-slot:actions="{ item }">
                        <router-link :to="'produtos/' + item.id" class="d-flex flex-wrap">
                            <h5 class="dtbutton">DETALHES</h5>
                        </router-link>
                    </template>
                </CardList>
            </div>
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
.tp {
    margin-bottom: 15px;
}

.dtbutton {
    color: white;
    background-color: rgb(13, 141, 214);
    text-align: center;
    margin-bottom: 0;
    width: 100%;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    padding-block: 1vh;
}

.li {
    width: 100%;
}
</style>
