<script setup>
import axios from "axios";

</script>

<template>
    <div class="page">
        <card-list
            :items="clientes"
            :fields="{
                cnpj: 'CNPJ',
                nome: 'CLIENTE',
                promotores: 'PROMOTORES',
                ultima_pesquisa: 'ÚLTIMA PESQUISA',
                ultima_visita: 'ÚLTIMA VISITA'
            }"
        ></card-list>
    </div>
</template>

<script>

import CardList from '../../components/CardList.vue'; // Caminho do componente

export default {
    components: {
        CardList
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
                    this.clientes = response.data.data; // assumindo que a resposta tem uma estrutura { data: [...] }
                })
                .catch(error => {
                    console.error('Erro ao carregar clientes: ', error);
                });
        }
    }
};
</script>
