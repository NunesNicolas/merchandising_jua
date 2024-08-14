<script setup>
import axios from "axios";
</script>

<template>
    <div class="page">
        <Breadcrumb pageTitle="Clientes" routeInfo="Dashboard / Clientes" />

        <ActionListWrapper>
            <ActionRouter route="/clientes/create" color="primary" label="Adicionar" />
            <ActionRouterBack />
        </ActionListWrapper>

        <CardList :items="clientes" :fields="{
            cnpj: 'CNPJ',
            nome: 'Cliente',
            estado: 'Estado',
            promotor: 'Promotor',
        }">

            <!-- Isso é o comportamento dinâmico que eu citei. Deste modo, podem adicionar mais coisas dentro do compontente -->
            <template v-slot:actions="{ item }">
                <router-link :to="'clientes/' + item.id" class="d-flex flex-wrap">
                    <i class="bi bi-file-earmark-text" style="font-size: 2rem; color: blue"></i>
                </router-link>

                <router-link :to="'clientes/' + item.id + '/update'" class="d-flex flex-wrap">
                    <i class="bi bi-pencil-square" style="font-size: 2rem; color: #000"></i>
                </router-link>

                <button @click="confirmDelete(item)" class="d-flex flex-wrap btn btn-link p-0">
                    <i class="bi bi-trash" style="font-size: 2rem; color: red"></i>
                </button>
            </template>
        </CardList>
    </div>
</template>

<script>

import CardList from '../../components/CardList.vue';
import Breadcrumb from '../../components/Breadcrumb.vue';
import ActionListWrapper from '../../components/ActionListWrapper.vue';
import ActionRouter from '../../components/ActionRouter.vue';
import ActionRouterBack from "../../components/ActionRouterBack.vue";

export default {
    components: {
        CardList,
        Breadcrumb
    },
    data() {
        return {
            clientes: [],
            promotores: []
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
        },
        confirmDelete(item) {
            if (confirm(`Você tem certeza que deseja excluir o cliente ${item.nome}?`)) {
                this.deleteCliente(item.id);
            }
        },
        deleteCliente(clienteId) {
            axios.delete(`/clientes/${clienteId}`)
                .then(response => {
                    alert('Cliente excluído com sucesso!');
                    this.fetchClientes(); // Atualiza a lista de clientes após exclusão
                })
                .catch(error => {
                    console.error('Erro ao excluir cliente: ', error);
                    alert('Ocorreu um erro ao tentar excluir o cliente.');
                });
        }
    }
};
</script>
