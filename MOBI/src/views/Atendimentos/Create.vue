<template>

    <FormAtendimentos :title="'Cadastrar atendimento'" :values="values" :submitLabel="'Criar Atendimento'" :onSave="saveAtendimento" />

</template>

<script>
import axios from "axios";
import FormAtendimentos from './Form.vue';


export default {
    name: 'CreateAtendimentos',
    components: {
        FormAtendimentos,
    },
    data() {
        return {
            values: {
                nome: '',
            }
        };
    },
    methods: {
        async saveAtendimento(formData) {
            try {
                const response = await axios.post('/', formData);
                if (response.status === 201) {
                    alert('Atendimento Criado')
                    this.$router.push('/');
                }
            } catch (error) {

                alert('Erro ao salvar atendimento', error);
            }
        }
    }
};
</script>