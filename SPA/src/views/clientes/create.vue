<template>
    <DefaultForm :title="'Novo Cliente'" :fieldLabels="fieldLabels" :initialValues="initialValues"
        :validations="validations" :onSave="saveClient" :submitLabel="'Criar cliente'" />
</template>

<script>
import axios from 'axios';
import DefaultForm from '../../components/DefaultForm.vue';
import { useRouter } from 'vue-router';

export default {
    name: 'createCliente',
    components: {
        DefaultForm
    },
    setup() {
        const router = useRouter();

        const fieldLabels = {
            nome: 'Nome',
            cnpj: 'CNPJ'
        };

        const initialValues = {
            nome: '',
            cnpj: ''
        };

        const validations = {
            nome: value => (!value ? 'Nome is required' : ''),
            cnpj: value => (!value ? 'CNPJ is required' : '')
        };

        const saveClient = async (formData) => {
            try {
                const response = await axios.post('/clientes', formData);
                console.log(response);
                if (response.status === 201) {
                    alert(response.statusText);
                    router.push('/clientes');
                }
            } catch (error) {
                console.error('Error saving cliente:', error);
            }
        };

        return {
            fieldLabels,
            initialValues,
            validations,
            saveClient
        };
    }
};
</script>