<template>
  <div class="SaveCancel">

    <Form :title="'Novo registro'" :values="values" :submitLabel="'Criar Registro'" :onSave="saveRegistro" />
    <!-- <SaveAndCancel :nosubmit="'Cancelar'" :submitLabel="'Salvar'" :onSave="saveRegistro"/> -->
  </div>
</template>

<script>
import axios from 'axios';
import Form from "./Form.vue";
import SaveAndCancel from "../../components/SaveAndCancel.vue";
import RegistroCamp from "../../components/RegistroComp.vue";

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
  },
};
</script>

<style>
#app {
  padding-bottom: 0vh;
}
.page {
  background-color: #000000;
}
.save {
  background-color: #ffffff;
  color: #2c9aff;
}
.cancel {
  background-color: #2c9aff;
  color: #ffffff;
  border: solid #fff 0.3vh;
}
.space {
  width: 0;
  height: 0;
}
.SaveCancel .butArea {
  box-shadow: 0vh 0vh 0vh 0vh #979797;
  background-color: #2c9aff;
}
</style>
