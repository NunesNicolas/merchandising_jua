<template>
    <Form :title="'Novo Cliente'" :initialValues="initialValues" :submitLabel="'Criar Cliente'" :onSave="saveClient" />
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
            initialValues: {
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
                console.log(response);
                if (response.status === 201) {
                    alert(response.statusText);
                    this.$router.push('/clientes');
                }
            } catch (error) {
                console.error('Error saving cliente:', error);
            }
        }
    }
};
</script>