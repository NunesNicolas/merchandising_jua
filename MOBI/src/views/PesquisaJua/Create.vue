<template>
 {{ teste }}
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
            console.log(formData);
            try {
               
                const response = await axios.post('/product_survey', formData);
                if (response.status === 201) {
                    alert('Pesquisas Salvas')
                }
            } catch (error) {

                alert('Erro ao salvar atendimento', error);
            }
        }
    },

   
};
</script>