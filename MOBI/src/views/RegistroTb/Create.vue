<template>
  <div class="SaveCancel">

    <Form :title="'Novo registro'" :values="values" :submitLabel="'Salvar'" :onSave="saveRegistro" />
    <ActionRouterBack/>
    <!-- <SaveAndCancel :nosubmit="'Cancelar'" :submitLabel="'Salvar'" :onSave="saveRegistro"/> -->
  </div>
</template>

<script>
import axios from 'axios';
import Form from "./Form.vue";
import SaveAndCancel from "../../components/SaveAndCancel.vue";
import RegistroCamp from "../../components/RegistroComp.vue";
import ActionRouterBack from "../../components/ActionRouterBack.vue"

export default {
  name: 'CreateRegistro',
    data(){
        return {
            values:{
                title: '',
            },
            routeId: this.$route.params.pesquisaid,
            
            
        }
    },
    methods: {
        async saveRegistro(formData) {
            try {
                console.log(this.routeId);
                formData.promotor_route_id = this.routeId;
                console.log(formData);
                const response = await axios.post('/workreg', formData);
                if (response.status === 201) {
                  alert('Registro salvo com sucesso !')
                  this.$router.push({ name: 'registro', params: { pesquisaid: this.routeId} });
                }
            } catch (error) {
                console.error('Erro ao salvar registro:', error);
                alert('Erro ao salvar registro', error);
            }
        }
    },
  components: {
    RegistroCamp,
    SaveAndCancel,
    Form,
    ActionRouterBack,
  },
};
</script>

<style scoped>

.SaveCancel{
  height: 100vh;
}

.SaveCancel a{
  border-radius: 1px;
  color:#2c9aff;
  text-align: center;
  justify-content: space-evenly;
  align-items: center;
  height: 7vh;
  font-weight: bold;
  font-size:3vh;
}

</style>