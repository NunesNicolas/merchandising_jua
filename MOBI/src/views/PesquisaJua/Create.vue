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
            teste: {}
        };
       
    },
    methods: {
        async iniciar() {
            axios.get("pesquisas/cliente_products/" + 2)
        .then((response1) => {
          this.teste = response1.data;
          console.log('testando coisa de louco:' + teste)
        })
        .catch((error) => {
          console.error(error);
        });
        },

        async savePesquisas(formData) {
            alert('aaaaa')
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

    mounted() {
        this.iniciar();
    },
};
</script>