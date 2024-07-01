<template>
    <PromotorForm :title="'Atualizar promotor'" :values="values" :submitLabel="'Atualizar promotor'"
        :onSave="updatePromotor" />
</template>

<script>
import axios from 'axios';
import PromotorForm from './Form.vue';

export default {
    name: 'Update',
    components: {
        PromotorForm
    },
    data() {
        return {
            values: {
                nome: '',
                email: '',
                senha: '',
                telefone: '',
            }
        };
    },
    created() {
        this.fetchPromotorData();
    },
    methods: {
        async fetchPromotorData() {
            try {
                const response = await axios.get(`/promotores/${this.$route.params.id}`);
                this.values = response.data.promotor;
            } catch (error) {
                console.error('Error fetching Promotor data:', error);
            }
        },
        async updatePromotor(formData) {
            try {
                const response = await axios.put(`/promotores/${this.$route.params.id}`, formData);
                
                if (response.status === 200) {
                    alert(response.statusText);
                    this.$router.push('/promotores');
                }
            } catch (error) {
                console.error('Error updating promotor:', error);
            }
        }
    }
};
</script>