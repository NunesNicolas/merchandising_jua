<template>

    <div class="page">
        <Breadcrumb pageTitle="Produto" routeInfo="Dashboard / Produtos / Cadastro" />
        <Form :created="true" :title="'Cadastrar Produto'" :values="values" :submitLabel="'Criar Produto'" :onSave="saveProduto" />
    </div>
</template>

<script>
import axios from 'axios';
import Form from './Form.vue'
import Breadcrumb from '../../components/Breadcrumb.vue';

export default {
    name: 'CreateProdutos',
    components: {
        Form,
        Breadcrumb
    },
    data() {
        return {
            values: {
                nome: '',
            }
        };
    },
    methods: {
        async saveProduto(formData) {
            try {
                const response = await axios.post('/produtos', formData);
                if (response.status === 201) {
                    alert('Produto Criado')
                    this.$router.push('/produtos');
                }
            } catch (error) {

                alert('Erro ao salvar produto', error);
            }
        }
    }
};
</script>