<script setup>
import axios from "axios";
</script>

<template>
    <div class="page">
        <Breadcrumb pageTitle="Clientes" routeInfo="Dashboard / Clientes" />

        <ActionListWrapper>
            <ActionRouter route="/clientes/create" color="primary" label="Adicionar" />
        </ActionListWrapper>

        <CardList :items="clientes" :fields="{
            cnpj: 'CNPJ',
            nome: 'CLIENTE',
            promotores: 'PROMOTORES',
            ultima_pesquisa: 'ÚLTIMA PESQUISA',
            ultima_visita: 'ÚLTIMA VISITA'
        }" />
    </div>
</template>

<script>

import CardList from '../../components/CardList.vue';
import Breadcrumb from '../../components/Breadcrumb.vue';
import ActionListWrapper from '../../components/ActionListWrapper.vue';
import ActionRouter from '../../components/ActionRouter.vue';

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
