<template>

    <div class="page">
        <Breadcrumb pageTitle="Cadastrar Cliente" routeInfo="Dashboard / Clientes / Cadastro" />
        <Form :title="'Cadastrar Cliente'" :values="values" :submitLabel="'Criar Cliente'" :onSave="saveClient" />
    </div>
</template>

<script>
import axios from 'axios';
import Form from './Form.vue';
import Breadcrumb from '../../components/Breadcrumb.vue';

export default {
    name: 'CreateCliente',
    components: {
        Form,
        Breadcrumb
    },
    data() {
        return {
            values: {
                nome: '',
                cnpj: '',
                tipo: ''
            }
        };
    },
    methods: {
        async saveClient(formData) {
            try {
                const response = await axios.post('/clientes', formData);
                if (response.status === 201) {
                    this.$router.push('/clientes');
                }
            } catch (error) {

                alert('Erro ao salvar cliente', error);
            }
        }
    }
};
</script>