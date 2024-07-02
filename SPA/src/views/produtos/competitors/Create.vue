<script setup>
import axios from "axios";
</script>

<template>

    <div class="page">
        <Breadcrumb pageTitle="Concorrente" routeInfo="Dashboard / Concorrente" />
        <Form :title="'Cadastrar Concorrente'" :values="values" :submitLabel="'Criar Competitor'" :onSave="saveCompetitor" />
    </div>
</template>

<script>

import Form from './Form.vue';
import Breadcrumb from '../../../components/Breadcrumb.vue';

export default {
    name: 'CreateCompetitors',
    components: {
        Form,
        Breadcrumb,
    },
    data() {
        return {
            competitor: {
                nome: '',
                brand: '',
            },
            errors: [],
        }
    },
    methods: {
        async saveCompetitor(formData) {
            try {
                const response = await axios.post('/competitors', formData);
                if (response.status === 201) {
                    alert('Concorrente Adicionado');
                    this.$router.go(-1);
                }
            } catch (error) {

                alert('Erro ao cadastrar concorrente', error);
            }
        }
    }
}

</script>