<template>
    <div class="page">
        <Breadcrumb pageTitle="Detalhes Cliente" routeInfo="Dashboard / Clientes / Detalhes" />

        <ActionListWrapper>
            <ActionRouterBack />
        </ActionListWrapper>

        <div class="d-flex">
            <BoxInfoWrapper>
                <slot>
                    <div class="box-line">
                        <label>Informações do Cliente</label>
                        <BoxInfo title="Nome" :value="cliente.nome"></BoxInfo>
                        <BoxInfo title="CNPJ" :value="cliente.cnpj"></BoxInfo>
                        <BoxInfo title="Endereço" :value="cliente.endereco"></BoxInfo>
                    </div>

                    <div class="box-line">
                        <img :src="cliente.imagem" height="300px" width="auto" />
                    </div>

                </slot>
            </BoxInfoWrapper>

            <div class="scroll-visitas">
                <div class="ml-3 mt-4" style="text-align: left;">
                    <label>Últimas Visitas</label>
                </div>
                <CardList :items="pesquisas" :fields="{
                    nome: 'Promotor',
                    checkout: 'Data da visita',

                }">
                    <template v-slot:actions="{ item }">
                        <router-link :to="{
                            name: 'infoPromotores',
                            params: { id: item.promotorid },
                          }" class="d-flex flex-wrap">
                            <i class="bi bi-file-earmark-text" style="font-size: 4vh; color: blue"></i>
                        </router-link>
                    </template>
                </CardList>
            </div>
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
            pesquisas: [],

            cliente: {
                nome: '',
                cnpj: '',
                endereco: ''
            },
        };
    },
    created() {
        this.fetchClientData();
        this.fetchPesquisasData();
    },
    methods: {
        async fetchClientData() {
            try {
                const response = await axios.get(`/clientes/${this.$route.params.id}`);
                this.cliente = response.data;
            } catch (error) {
                console.error('Error fetching client data:', error);
                // You can also display an error message to the user here
            }
        },

        async fetchPesquisasData() {
            const response2 = await axios.get(`pesquisas/cliente/${this.$route.params.id}`);
            const cache = (await response2).data
            console.log(cache)
            this.pesquisas = cache.slice(0, 5).map(pesquisa => ({
                id: pesquisa.id,
                nome: pesquisa.promotor.nome,
                checkin: pesquisa.checkin_datetime,
                checkout: pesquisa.checkout_datetime,
                promotorid: pesquisa.promotor.id,
            }));
        }
    }
};
</script>

<style scoped>
.scroll-visitas {
    margin-top: 15px;
    margin-right: 2vh;
    margin-bottom: 2vh;
    width: 50vw;
    background-color: #ffffff;
    border: solid 0.5px lightgray;
    border-radius: 1vh;
    overflow-y: scroll;
    overflow-x: unset;
}

::-webkit-scrollbar {
    width: 0.5vw;
}

::-webkit-scrollbar-track {
    background-color: #77bcfd;
}

::-webkit-scrollbar-thumb {
    background-color: #2C9AFF;
}

.box-line {
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    align-items: flex-start;
    width: 100%;
    gap: 1em;
}

.box-line img{
    border-radius: 3vh;
}

.box-info-wrapper {
    width: 55%;
    margin-bottom: 2vh;
}

.tabelas {
    margin-left: -1vw;
    width: 44vw;
}

label {
    margin-top: 2vh;
    font-size: 17px;
    color: #858585;
    font-weight: bold;
    margin-bottom: 0.5em;
}
</style>