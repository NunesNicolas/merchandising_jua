<template>
    <h1>Pesquisa Concorrentes</h1>
    <FormPesquisaCompetitors :submitLabel="'Criar Pesquisa'" :onSave="savePesquisas" />
    
</template>

<script>
import axios from "axios";
import FormPesquisaCompetitors from './Form.vue';


export default {
    name: 'CreatePesquisaCompetitors',
    components: {
        FormPesquisaCompetitors,
    },
    data() {
        return {
        };
    },
    methods: {
        async savePesquisas(formData) {
            console.log(formData);
            try {
               
                const response = await axios.post('/competitor_survey', formData);
                if (response.status === 201) {
                    alert('Pesquisas Salvas')
                    this.$router.push('/');
                }
            } catch (error) {

                alert('Erro ao salvar atendimento', error);
            }
        }
    }
};
</script>