<template>
    <DefaultForm :values="formValues" :validations="validations" :onSave="handleSave" :submitLabel="submitLabel">
      
      <template v-slot="{ formValues, updateFormValue }">
        <h1>{{ title }}</h1>
        <hr>
        <TextInput label="ID do cliente" name="id_cli" :modelValue="formValues.cliente_id"
          @update:modelValue="updateFormValue('cliente_id', $event)" />
        <TextInput label="ID do promotor" name="id_pro" :modelValue="formValues.promotor_id"
          @update:modelValue="updateFormValue('promotor_id', $event)" />
        <DateInput label="Data:" name="data" :modelValue="formValues.route_date"
          @update:modelValue="updateFormValue('route_date', $event)"/>
      </template>
    </DefaultForm> 
  </template>
  
<script>
import DefaultForm from '../../components/Form/DefaultForm.vue';
import FormAtendimentos from '../../components/Form/DefaultForm.vue';
import TextInput from '../../components/Form/TextInput.vue';
import DateInput from '../../components/Form/DateInput.vue';
 
  
  export default {
    name: 'FormAtendimentos',
    components: {
      FormAtendimentos,
      TextInput,
      DefaultForm,
      DateInput,

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
    }
  }
  };
  </script>