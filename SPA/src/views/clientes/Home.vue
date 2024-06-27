<script setup>
import axios from "axios";

</script>

<template>
    <div class="page">

        <Breadcrumb pageTitle="Promotores" routeInfo="Dashboard / Promotores" />

        <div style='text-align: right; margin-right:' class="mt-2 ml-auto">
            <router-link to="/promotores/create">
                <button class="btn btn-primary"
                    style="background-color: #2c9aff; border-radius: 30px; margin-right: 42px; text-align: right; border: none;">
                    <font color="#ffffff">Adicionar Promotor</font>
                </button>
            </router-link>
        </div>
        
        <card-list :items="clientes" :fields="{
            cnpj: 'CNPJ',
            nome: 'CLIENTE',
            promotores: 'PROMOTORES',
            ultima_pesquisa: 'ÚLTIMA PESQUISA',
            ultima_visita: 'ÚLTIMA VISITA'
        }"></card-list>
    </div>
</template>

<script>

import CardList from '../../components/CardList.vue'; 
import Breadcrumb from '../../components/Breadcrumb.vue';

export default {
    components: {
        CardList,
        Breadcrumb
    },
    data() {
        return {
            clientes: []
        };
    },
    created() {
        this.fetchClientes();
    },
    methods: {
        fetchClientes() {
            axios.get('/clientes')
                .then(response => {
                    this.clientes = response.data;
                })
                .catch(error => {
                    console.error('Erro ao carregar clientes: ', error);
                });
        }
    }
};
</script>
