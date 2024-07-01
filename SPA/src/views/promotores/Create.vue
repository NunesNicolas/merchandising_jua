<script setup>
import axios from "axios";
</script>

<template>

    <div class="page">
        <Breadcrumb pageTitle="Promotor" routeInfo="Dashboard / Promotores" />
        <Form :title="'Cadastrar promotor'" :values="values" :submitLabel="'Criar Promotor'" :onSave="savePromotor" />
    </div>
</template>

<script>

import Form from './Form.vue';
import Breadcrumb from '../../components/Breadcrumb.vue';

export default {
    name: 'createPromotores',
    data() {
        return {
            promotor: {
                nome: '',
                email: '',
                senha: '',
                telefone: ''
            },
            errors: [],
        }
    },
    methods: {
        async savePromotor(formData) {
            try {
                const response = await axios.post('/promotores', formData);
                if (response.status === 201) {
                    this.$router.push('/promotores');
                }
            } catch (error) {

                alert('Erro ao cadastrar cliente', error);
            }
        }
    }
}

</script>