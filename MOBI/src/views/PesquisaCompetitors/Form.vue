<template>
    <div style="margin-bottom: 10vh">
        <headerEmpresa :visita="pesquisa" />

        <div v-for="competitor in competitors">
            <researchField @preencher="adicionarCompetitor($event)" :item="competitor" :label="'nome'" :label2="'brand'"
                :key="competitor.id" :fields="{
                    nome: 'Nome',
                    price: 'Preço',
                }" />
                {{ competitors }}
        </div>

        <div style="position: relative;">
            <nav>
                <ActionRouterBack style="margin-top: -15px;margin-bottom: -15px " />
                <ActionRouter 
    @click="finalizar()" 
    :color="'primary'" 
    :label="'Salvar'" 
    :route="{ name: 'pesquisa', params: { pesquisaid: $route.params.pesquisaid } }" 
    :disabled="isPesquisaConcluida"
  />
 </nav>
        </div>
    </div>


</template>
<script>
import axios from 'axios';
import headerEmpresa from "../../components/headerEmpresa.vue";
import researchField from "../../components/researchField.vue";
import ActionRouterBack from "../../components/ActionRouterBack.vue"
import ActionRouter from "../../components/ActionRouter.vue"
export default {
    name: 'FormPesquisaJua',
    props: {
        values: Object,
        submitLabel: String,
        onSave: Function,
    },
    data() {
        return {
            id: this?.$route?.params?.pesquisaid,
            pesquisa: {},
            competitors: [],
            pesquisascompetitor: [],
            formValues: []

        }
    },
    components: {
        headerEmpresa,
        researchField,
        ActionRouterBack,
        ActionRouter,
    },

    methods: {
        async fetchPesquisa() {
            let response = axios.get('/pesquisas/' + this.id)
            this.pesquisa = (await response).data;
            console.log('Dados da pesquisa:', this.pesquisa);
        },
        async fetchCompetitors() {
            let response = axios.get('/all/competitors')
            this.competitors = (await response).data;
            console.log(this.competitors);
        },
        pushPesquisasCompetitor(object) {
            this.pesquisascompetitor.push(object);
        },

        adicionarCompetitor(index) {
            if (this.formValues) {
                const existingIndex = this.formValues.findIndex((item) => item.competitor_id === index.competitor_id);
                if (existingIndex !== -1) {
                    // Editar o item existente
                    this.formValues[existingIndex] = index;
                } else {
                    // Adicionar um novo item
                    this.formValues.push(index);
                }
            } else {
                // Caso o array esteja vazio, criar um novo array com o item
                this.formValues = [index];
            }
        },

        excluirModelValue(modelValue) {
            const index = this.formValues.indexOf(modelValue);
            if (index !== -1) {
                this.formValues.splice(index, 1);
            }
        },

        finalizar() {
        this.onSave(this.formValues);
        },
    },

    computed: {
    isPesquisaConcluida() {
       return this.pesquisa.status == 'CONCLUIDO';
    }
  },

    mounted() {
        this.fetchPesquisa();
        this.fetchCompetitors();
    }

}
</script>
<style scoped>
nav {
    background-color: rgb(252, 252, 252);
    box-shadow: 0vw 0vw 0.6vw 0vw;
    position: fixed;
    bottom: 8vh;
    width: 100%;
    height: auto;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    display: flex;
    justify-content: center;
}

button {
    width: 100%;
}
</style>