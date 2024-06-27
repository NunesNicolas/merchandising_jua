<template>
    <ClientForm :title="'Atualizar Cliente'" :values="values" :submitLabel="'Atualizar Cliente'"
        :onSave="updateClient" />
</template>

<script>
import axios from 'axios';
import ClientForm from './Form.vue';

export default {
    name: 'Update',
    components: {
        ClientForm
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
    created() {
        this.fetchClientData();
    },
    methods: {
        async fetchClientData() {
            try {
                const response = await axios.get(`/clientes/${this.$route.params.id}`);
                this.values = response.data;
                console.log(this.initialValues)
            } catch (error) {
                console.error('Error fetching client data:', error);
            }
        },
        async updateClient(formData) {
            try {
                const response = await axios.put(`/clientes/${this.$route.params.id}`, formData);
                console.log(response);
                if (response.status === 200) {
                    alert(response.statusText);
                    this.$router.push('/clientes');
                }
            } catch (error) {
                console.error('Error updating cliente:', error);
            }
        }
    }
};
</script>