<template>

    <div class="page">
        <Breadcrumb pageTitle="Produtos" routeInfo="Dashboard / Produtos" />
        <Form :title="'Cadastrar produto'" :values="values" :submitLabel="'Criar Produto'" :onSave="saveProduto" />
    </div>
</template>

<script>
import axios from 'axios';
import Form from './Form.vue'
import Breadcrumb from '../../components/Breadcrumb.vue';

export default {
    name: 'createProdutos',
    components: {
        Form,
        Breadcrumb
    },
    data() {
        return {
            values: {
                nome: '',
                img: ''
            }
        };
    },
    methods: {
        async saveProduto(formData) {
            try {
                const response = await axios.post('/produtos', formData);
                if (response.status === 201) {
                    this.$router.push('/produtos');
                }
            } catch (error) {

                alert('Erro ao salvar produto', error);
            }
        }
    }
};
</script>