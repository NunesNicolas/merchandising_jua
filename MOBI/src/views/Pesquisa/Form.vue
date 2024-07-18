<template>
    <DefaultForm :values="formValues" :validations="validations" :onSave="handleSave" :submitLabel="submitLabel">
      
      <template v-slot="{ formValues, updateFormValue }">
        <h1>{{ title }}</h1>
        <hr>
        <SelectInput label="ID do cliente" name="id_cli" :modelValue="formValues.cliente_id" :options="this.clientes"
          @update:modelValue="updateFormValue('cliente_id', $event)" />
        <SelectInput label="ID do promotor" name="id_pro" :modelValue="formValues.promotor_id" :options="this.promotores"
          @update:modelValue="updateFormValue('promotor_id', $event)" />
        <DateInput label="Data:" name="data" :modelValue="formValues.route_date"
          @update:modelValue="updateFormValue('route_date', $event)"/>
      </template>
    </DefaultForm> 
  </template>
  
<script>
import axios from "axios";
import DefaultForm from '../../components/Form/DefaultForm.vue';
import FormAtendimentos from '../../components/Form/DefaultForm.vue';
import TextInput from '../../components/Form/TextInput.vue';
import DateInput from '../../components/Form/DateInput.vue';
import SelectInput from '../../components/Form/SelectInput.vue';
 
  
  export default {
    name: 'FormAtendimentos',
    components: {
      FormAtendimentos,
      TextInput,
      DefaultForm,
      DateInput,
      SelectInput,

    },
    props: {
      title: String,
      values: Object,
      submitLabel: String,
      onSave: Function
    },
    watch: {
    values: {
      handler(newValue) {
        this.formValues = { ...newValue }; // Atualiza formValues com os novos valores
      },
      deep: true // Observação profunda para objetos e arrays
    }
  },
  data() {
    return {
      formValues: { ...this.values },
        clientes: [],
        promotores: [],
      
      
      validations: {
        cliente_id: value => (!value ? 'ID do cliente é obrigatório' : ''),
        promotor_id: value => (!value ? 'ID do cliente é obrigatório' : ''),
        route_date: value => (!value ? 'Data é obrigatório' : ''),
      }
    };
  },
  methods: {
    handleSave(formData) {
      this.onSave(formData);
    },
    getSelects() {
    axios.get('/promotores').then(response => {
    response.data.forEach(item => {
      this.promotores.push({
        text: item.nome,
        value: item.id,
      });
    });
    console.log(this.promotores);
  });
  axios.get('/clientes').then(response => {
    response.data.forEach(item => {
      this.clientes.push({
        text: item.nome,
        value: item.id,
      });
    });
    console.log(this.clientes);
  });
}
  },
  mounted() {
    this.getSelects();
  }
  };
  </script>