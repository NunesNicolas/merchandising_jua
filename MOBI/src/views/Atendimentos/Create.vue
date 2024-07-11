<template>

    <FormAtendimentos :created="true" title="Cadastrar Atrendimento" :values="values" :submitLabel="'Criar Atendimento'"
        :onSave="saveAtendimento" />

</template>

<script>
import axios from "axios";
import FormAtendimentos from '../../components/Form/DefaultForm.vue';

export default {
    name: 'CreateProdutos',
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