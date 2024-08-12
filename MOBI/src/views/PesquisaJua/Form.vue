<template>
    <div class="FormJua">
        <headerEmpresa :visita="pesquisa" />

        <div class="add-but">
            <ActionRouter :route="{ name: 'pesquisa', params: { pesquisaid: id } }">
                <slot><i class="bi bi-arrow-left-square icon-right" title="Voltar"
                        style="font-size: 25px; background-color:white;"></i></slot>
            </ActionRouter>
            <h5 class="name">Pesquisa Concorrentes</h5>
        </div>

        <div v-for="produto in produtos">
            <researchField @preencher="adicionarProduto($event)" @excluirModelValue="excluirModelValue" :item="produto"
                :label="'nome'" :label2="'weight'" :label3="'price'" :clienteid="pesquisa.cliente_id"
                :product_or_competitor="'product'" :key="produto.id" />
        </div>

        <div style="position: relative; ">
            <div class="SaveCancel">
                <ActionRouter @click="finalizar()" :color="'primary'" :label="'Salvar'"
                    :route="{ name: 'pesquisa', params: { pesquisaid: $route.params.pesquisaid } }"
                    :disabled="isPesquisaConcluida" />
            </div>

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
                let response = await axios.get('/all/produtos');
                this.produtos = response.data;
                console.log(this.produtos);

                let response1 = await axios.get("product_survey/cliente_products/" + this.pesquisa.cliente_id);
                const auxiliar = response1.data;

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
.FormJua {
    padding-bottom: 24vh;
    background-color: rgb(246, 246, 246);
    bottom: 8vh;
    padding-bottom: 25vh;
    height: auto;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    justify-content: center;
}

.add-but {
    height: 5vh;
    text-align: right;
    display: flex;
    flex-direction: row-reverse;
    justify-content: space-between;
}

.SaveCancel {
    border-top: 0.2vh solid rgb(170, 170, 170);
    background-color: rgb(246, 246, 246);
    width: 100%;
    position: fixed;
    display: flex;
    justify-content: center;
    align-items: center;
    bottom: 8vh;
    height: 12vh;
    flex-wrap: wrap;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.SaveCancel a {
    color: #2c9aff;
    text-align: center;
    justify-content: space-evenly;
    align-items: center;
    font-weight: bold;
    font-size: 3vh;
}
</style>