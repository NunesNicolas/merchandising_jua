<template>

    <FormPesquisaJua :submitLabel="'Criar Pesquisa'" :onSave="savePesquisas" />

</template>

<script>
import axios from "axios";
import FormPesquisaJua from './Form.vue';


export default {
    name: 'CreatePesquisaJua',
    components: {
        FormPesquisaJua,
    },
    data() {
        return {
        };
    },
    methods: {
        async savePesquisas(formData) {
            alert('aaaaa')
            console.log(formData);
            try {
               
                const response = await axios.post('/product_survey', formData);
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