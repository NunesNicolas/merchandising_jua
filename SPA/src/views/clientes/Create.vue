<template>
    <Form :title="'Novo Cliente'" :values="values" :submitLabel="'Criar Cliente'" :onSave="saveClient" />
</template>

<script>
import axios from 'axios';
import Form from './Form.vue';

export default {
    name: 'CreateCliente',
    components: {
        Form
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