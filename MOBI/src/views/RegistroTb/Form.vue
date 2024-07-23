<template>
    <DefaultForm :values="formValues" :validations="validations" :onSave="handleSave" :submitLabel="submitLabel">
  
      <template v-slot="{ formValues, updateFormValue }">
        <div class="forminput">
        <h1>{{ title }}</h1>
        <hr>
        
        <TextInput label="Titulo do Registro:" name="titulo" :modelValue="formValues.title"
          @update:modelValue="updateFormValue('title', $event)" />
        <SelectInput label="Selecionar o Tipo de Registro:" name="type" :modelValue="formValues.type" :options="tiposOptions"
          @update:modelValue="updateFormValue('type', $event)" />
        <ImageUploadInput label="Adicionar Imagem" name="img" :modelValue="formValues.img" 
          @update:modelValue="updateFormValue('img', $event)" />
        </div>
      </template>
    </DefaultForm>
  </template>
  
  <script>
  import DefaultForm from '../../components/Form/DefaultForm.vue';
  import TextInput from '../../components/Form/TextInput.vue';
  import SelectInput from '../../components/Form/SelectInput.vue';
  import ImageUploadInput from '../../components/Form/ImageUploadInput.vue';
  
  
  
  export default {
    name: 'Form',
    components: {
      DefaultForm,
      TextInput,
      SelectInput,
      ImageUploadInput
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
        tiposOptions: [
          { value: '1', text: 'Tipo 1' },
          { value: '2', text: 'Tipo 2' },
          { value: '3', text: 'Tipo 3' }
        ],
        validations: {
          title: value => (!value ? 'Um titulo é obrigatório' : ''),
          
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

  <style scoped> 


  .forminput{
    width: 100%;
    font-size: 2.5vh;
    color: black;
    background-color: white;
    font-weight: 500;
  }

  h1{
    font-size: 4vh;
    padding-top: 3vh;
    padding-bottom: 1.5vh;
  }
  .forminput hr{
    border-width: 0.3vh;
    padding-bottom: 1.5vh;
    opacity: 100;
  }
  .forminput ImageUploadInput{
   display: flex;
  }

</style>
  