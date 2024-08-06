<template>
    <div class="SaveCancel">
        <FormPesquisaCompetitors :submitLabel="'Criar Pesquisa'" :onSave="savePesquisas" />
    </div>
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

<style scoped>
</style>