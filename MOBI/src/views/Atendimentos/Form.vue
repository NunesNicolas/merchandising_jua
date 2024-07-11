<template>
    <FormAtendimentos :values="formValues" :validations="validations" :onSave="handleSave" :submitLabel="submitLabel">
      <template v-slot="{ formValues, updateFormValue }">
        <h1>{{ title }}</h1>
        <hr>
        <TextInput label="Nome" name="nome" :modelValue="formValues.nome"
          @update:modelValue="updateFormValue('nome', $event)" />
        
          
      </template>
    </FormAtendimentos>
  </template>
  
  <script>
    import FormAtendimentos from '../../components/Form/DefaultForm.vue';
    import TextInput from '../../components/form/TextInput.vue';
 
  
  export default {
    name: 'FormAtendimentos',
    components: {
      DefaultForm,
      TextInput,

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
      onSave: Function,
      created: Boolean
    },
    watch: {
      values: {
        handler(newValue) {
          this.formValues = { ...newValue };
        },
        deep: true
      }
    },
    methods: {
      handleSave(formData) {
        this.onSave(formData);
      },
      updateFormValue(key, value) {
        this.formValues[key] = value;
      }
    },
    mounted() {
      this.formValues = { ...this.values };
    }
  };
  </script>