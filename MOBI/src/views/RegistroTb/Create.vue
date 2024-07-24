<template>
  <div class="SaveCancel">

    <Form :title="'Novo registro'" :values="values" :submitLabel="'Salvar'" :onSave="saveRegistro" />
    <ActionRouterBack/>
    <button type="submit" class="btn btn-primary" :style="{ height: '7vh', fontSize: '3vh'}">
    Voltar
    </button>
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
  background-color: white;
  height: 100vh;
}

.SaveCancel a{
  border-radius: 20px;
  border:solid #858585 0.2vh;
  color:#2c9aff;
  font-weight: bold;
  font-size:5vh;
}

</style>