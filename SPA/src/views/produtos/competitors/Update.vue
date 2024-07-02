<template>
    <CompetitorForm :title="'Atualizar Concorrente'" :values="values" :submitLabel="'Atualizar Concorrente'"
        :onSave="updateCompetitor" />
</template>

<script>
import axios from 'axios';
import CompetitorForm from './Form.vue';

export default {
    name: 'UpdateCompetitors',
    components: {
        CompetitorForm
    },
    data() {
        return {
            values: {
                nome: '',
                brand: '',
            }
        };
    },
    created() {
        this.fetchCompetitorData();
    },
    methods: {
        async fetchCompetitorData() {
            try {
                const response = await axios.get(`/competitors/${this.$route.params.id}`);
                this.values = response.data.competitor;
            } catch (error) {
                console.error('Error fetching concorrente data:', error);
            }
        },
        async updateCompetitor(formData) {
            try {
                const response = await axios.put(`/competitors/${this.$route.params.id}`, formData);
                
                if (response.status === 200) {
                    alert(response.statusText);
                    this.$router.go(-1);
                }
            } catch (error) {
                console.error('Error updating concorrente:', error);
            }
        }
    }
};
</script>