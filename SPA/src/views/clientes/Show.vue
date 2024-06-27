<template>
    <div class="page">
        <Breadcrumb pageTitle="Clientes" routeInfo="Dashboard / Clientes" />

        <ActionListWrapper>
            <ActionRouterBack/>
        </ActionListWrapper>

        <BoxInfoWrapper>
            <slot>
                <div class="box-line">
                    <BoxInfo title="Nome" :value="cliente.nome"></BoxInfo>
                    <BoxInfo title="CNPJ" :value="cliente.cnpj"></BoxInfo>
                </div>

                <div class="box-line">
                    <BoxInfo title="Endereço" :value="cliente.endereco"></BoxInfo>
                </div>
            </slot>
        </BoxInfoWrapper>
    </div>
</template>
<script>

import axios from 'axios';
import ActionListWrapper from "../../components/ActionListWrapper.vue";
import ActionRouterBack from "../../components/ActionRouterBack.vue";
import BoxInfoWrapper from "../../components/Box/BoxInfoWrapper.vue";
import BoxInfo from "../../components/Box/BoxInfo.vue";
import Breadcrumb from "../../components/Breadcrumb.vue";



export default {
    name: 'Show',
    components: {
        ActionListWrapper,
        ActionRouterBack,
        BoxInfoWrapper,
        BoxInfo,
        Breadcrumb
    },
    data() {
        return {
            cliente: {
                nome: '',
                cnpj: '',
                endereco: ''
            }
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
    flex-direction: row;
    align-items: flex-start;
    width: 100%;
    gap: 1em;
}
</style>