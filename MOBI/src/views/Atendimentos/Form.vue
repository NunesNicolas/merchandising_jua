<template>
    <DefaultForm :values="formValues" :validations="validations" :onSave="handleSave" :submitLabel="submitLabel">
      
      <template v-slot="{ formValues, updateFormValue }">
        <h1>{{ title }}</h1>
        <hr>
        <TextInput label="Nome" name="nome" :modelValue="formValues.nome"
          @update:modelValue="updateFormValue('nome', $event)" />
      </template>
    </DefaultForm> 
  </template>
  
<script>
import DefaultForm from '../../components/Form/DefaultForm.vue';
import FormAtendimentos from '../../components/Form/DefaultForm.vue';
import TextInput from '../../components/Form/TextInput.vue';
 
  
  export default {
    name: 'FormAtendimentos',
    components: {
      FormAtendimentos,
      TextInput,
      DefaultForm,

    },
    data() {
      return {
        formValues: { ...this.values },
        validations: {
          nome: value => (!value ? 'Nome é obrigatório' : '')
        },
        
      };
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
        nome: value => (!value ? 'Nome é obrigatório' : ''),
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