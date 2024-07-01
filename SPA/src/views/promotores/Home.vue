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


        <nav id="main-container" style="text-align: center; flex-wrap: wrap;">
           <div class="d-flex" style="padding: 20px;  gap:50px;">
            <CardList :textBox="true" :items="promotores" :fields="{
                nome: 'Promotor',
                telefone: 'Telefone',
            }">

                <template v-slot:topactions="{ item }">
                    <button @click="confirmDelete(item)" class="d-flex flex-wrap btn btn-link p-0">
                        <i class="bi bi-trash" style="font-size: 4vh; color: red; margin-left: 0.5vw;"></i>
                    </button>
                </template>

                <template v-slot:actions="{ item }">
                    <router-link :to="'promotores/' + item.id" class="d-flex flex-wrap">
                        <h5 class="dtbutton">DETALHES</h5>
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
            promotores: [],
        };
    },

    methods: {
        async getPromotores() {
            let response = axios.get('/promotores');
            this.promotores = (await response).data;
        },
        confirmDelete(item) {
            if (confirm(`Você tem certeza que deseja excluir o promotor ${item.nome}?`)) {
                this.deletePromotor(item.id);
            }
        },
        deletePromotor(promotorId) {
            axios.delete(`/promotores/${promotorId}`)
                .then(response => {
                    alert('Promotor excluído com sucesso!');
                    this.getPromotores(); // Atualiza a lista de clientes após exclusão
                })
                .catch(error => {
                    console.error('Erro ao excluir cliente: ', error);
                    alert('Ocorreu um erro ao tentar excluir o cliente.');
                });
        }
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
    padding-block: 1vh;
}

.li {
    width: 100%;
}
</style>
