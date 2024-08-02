<template>
    <div style="background-color: #ffffff;">
          <headerEmpresa :visita="pesquisa" />
        <div class="tamanho">
            <researchField/>
            <ActionRouterBack style="margin-top: 30px;"/>
        </div>
    </div>
</template>

<style>
.tamanho{
    padding-bottom: 20vh;
}


</style>

<script>
import axios from 'axios';
import headerEmpresa from "../../components/headerEmpresa.vue";
import researchField from "../../components/researchField.vue";
import ActionRouterBack from "../../components/ActionRouterBack.vue"
export default {
    data() {
        return {
            id: this?.$route?.params?.pesquisaid,
            pesquisa: {},
            produtos: [],
        }
    },
    components: {
        headerEmpresa,
        researchField,
        ActionRouterBack,
    },

    methods: {
        async fetchPesquisa() {
            let response = axios.get('/pesquisas/' + this.id)
            this.pesquisa = (await response).data;
            console.log('Dados da pesquisa:', this.pesquisa);
        },
        async fetchProdutos() {
            let response = axios.get('/produtos')
            this.produtos = (await response).data;
            console.log(this.produtos);
        },
    },
    mounted() {
        this.fetchPesquisa();
    },

}
</script>