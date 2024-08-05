<template>
    <div style="margin-bottom: 10vh">
        <headerEmpresa :visita="pesquisa" />
        <div v-for="produto in produtos">
            <researchField @preencher="adicionarProduto($event)"
            @excluirModelValue="excluirModelValue" 
            :item="produto" :label="'nome'" :label2="'weight'" :label3="'price'"
            :clienteid="pesquisa.cliente_id"
            :key="produto.id" :fields="{
                    nome: 'Nome',
                    price: 'Preço',
                }" />
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
            produtos: [],
            formValues: [],
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

        async fetchProdutos() {
            try {
                // Primeiro fetch para obter os produtos
                let response = await axios.get('/all/produtos');
                this.produtos = response.data;
                console.log(this.produtos);

                // Segundo fetch para obter os preços dos produtos relacionados ao cliente
                let response1 = await axios.get("product_survey/cliente_products/" + this.pesquisa.cliente_id);
                const auxiliar = response1.data;
                console.log('testando coisa de louco:' + auxiliar);

                // Atualizar os produtos com os preços
                this.produtos = this.produtos.map((produto) => {
                    const produtoAuxiliar = auxiliar.find((item) => item.product_id === produto.id);
                    return { ...produto, price: produtoAuxiliar ? produtoAuxiliar.price : null };
                });
            } catch (error) {
                console.error(error);
            }
        },

        adicionarProduto(index) {
            if (this.formValues) {
                const existingIndex = this.formValues.findIndex((item) => item.product_id === index.product_id);
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
        this.fetchProdutos();
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