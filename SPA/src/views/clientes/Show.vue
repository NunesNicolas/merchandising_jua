<template>
    <div class="page">
        <Breadcrumb pageTitle="Clientes" routeInfo="Dashboard / Clientes" />

        <ActionListWrapper>
            <ActionRouterBack />
        </ActionListWrapper>

    <div class="d-flex">
        <BoxInfoWrapper>
            <slot>
                <div class="box-line">
                    <BoxInfo title="Nome" :value="cliente.nome"></BoxInfo>
                    <BoxInfo title="CNPJ" :value="cliente.cnpj"></BoxInfo>
                    <BoxInfo title="Endereço" :value="cliente.endereco"></BoxInfo>
                </div>

                <div class="box-line">
                    <img :src="cliente.imagem" height="300px" width="auto"/>
                </div>

            </slot>
        </BoxInfoWrapper>

        <CardList :items="visitas" :fields="{
            date: 'Data da visita',
        }">

            <!-- <template v-slot:actions="{ item }">
                <router-link :to="'#'" class="d-flex flex-wrap">
                    <i class="bi bi-file-earmark-text" style="font-size: 2rem;"></i>
                </router-link>
                <router-link :to="'#'" class="d-flex flex-wrap">
                    <i class="bi bi-camera-fill" style="font-size: 2rem;"></i>
                </router-link>
            </template> -->
        </CardList>
        <br />
        <br />
        </div>
    </div>
</template>
<script>

import axios from 'axios';
import ActionListWrapper from "../../components/ActionListWrapper.vue";
import ActionRouterBack from "../../components/ActionRouterBack.vue";
import BoxInfoWrapper from "../../components/Box/BoxInfoWrapper.vue";
import BoxInfo from "../../components/Box/BoxInfo.vue";
import Breadcrumb from "../../components/Breadcrumb.vue";
import CardList from '../../components/CardList.vue';


export default {
    name: 'Show',
    components: {
        ActionListWrapper,
        ActionRouterBack,
        BoxInfoWrapper,
        BoxInfo,
        Breadcrumb,
        CardList
    },
    data() {
        return {
            cliente: {
                nome: '',
                cnpj: '',
                endereco: ''
            },
            visitas: [
                {
                    date: '29/12/2024'
                },
                {
                    date: '01/17/2024'
                },
                {
                    date: '02/07/2024'
                },
            ]
        };
    },
    created() {
        this.fetchClientData();
    },
    methods: {
        async fetchClientData() {
            try {
                const response = await axios.get(`/clientes/${this.$route.params.id}`);
                this.cliente = response.data;
            } catch (error) {
                console.error('Error fetching client data:', error);
            }
        }
    }
};
</script>

<style scoped>



.box-line {
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    align-items: flex-start;
    width: 100%;
    gap: 1em;
}

.box-info-wrapper{
    width: 47%;
}

.tabelas{
    margin-left: -1vw;
    width: 48vw;
}

</style>