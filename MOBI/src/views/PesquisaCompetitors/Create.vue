<template>
    <div class="SaveCancel">
        <FormPesquisaCompetitors :produtos="produtos" :competitors="competitors" :submitLabel="'Criar Pesquisa'" :onSave="savePesquisas" />
    </div>
</template>

<script>
import axios from "axios";
import FormPesquisaCompetitors from './Form.vue';


export default {
    name: 'CreatePesquisaCompetitors',
    components: {
        FormPesquisaCompetitors,
    },
    data() {
        return {
            competitors: [],
            produtos: [],
        };
    },
    methods: {
        async savePesquisas(formData) {
            console.log(formData);
            try {

                const response = await axios.post('/competitor_survey', formData);
                if (response.status === 201) {
                    alert('Pesquisas Salvas')
                    // this.$router.push('/');
                }
            } catch (error) {

                alert('Erro ao salvar atendimento', error);
            }
        },
        async fetchProdutos() {
            try {
                let response = await axios.get('/all/produtos');
                this.produtos = response.data;

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
        async fetchCompetitors() {
            try {
                // Primeiro fetch para obter os competitors
                let response = await axios.get("/all/competitors");
                this.competitors = response.data;
                console.log(this.competitors);

                // Segundo fetch para obter os preços dos competitors relacionados ao cliente
                let response1 = await axios.get(
                    "competitor_survey/cliente_competitors/" + this.pesquisa.cliente_id
                );
                const auxiliar = response1.data;
                console.log("Testando:" + auxiliar);

                this.competitors = this.competitors.map((competitor) => {
                    const competitorAuxiliar = auxiliar.find(
                        (item) => item.competitor_id === competitor.id
                    );
                    return {
                        ...competitor,
                        price: competitorAuxiliar ? competitorAuxiliar.price : null,
                    };
                });

            } catch (error) {
                console.error(error);
            }
        },

    },
    mounted() {
        this.fetchProdutos();
        this.fetchCompetitors().then(() => {
  });
    },
    computed() {

    }
};
</script>

<style scoped></style>