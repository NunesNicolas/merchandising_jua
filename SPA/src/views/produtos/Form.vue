<template>
  <DefaultForm :values="formValues" :validations="validations" :onSave="handleSave" :submitLabel="submitLabel">
    <template v-slot="{ formValues, updateFormValue }">
      <h1>{{ title }}</h1>
      <hr>
      <TextInput label="Nome" name="nome" :modelValue="formValues.nome"
        @update:modelValue="updateFormValue('nome', $event)" />
      <TextInput label="link da imagem" name="img" :modelValue="formValues.img"
        @update:modelValue="updateFormValue('img', $event)" />
     
    </template>
  </DefaultForm>
</template>

<script>
import DefaultForm from '../../components/form/DefaultForm.vue';
import TextInput from '../../components/form/TextInput.vue';
import SelectInput from '../../components/form/SelectInput.vue';
import ImageUploadInput from '../../components/form/ImageUploadInput.vue';


export default {
  name: 'Form',
  components: {
    DefaultForm,
    TextInput,
    SelectInput,
    ImageUploadInput,

  },

  data() {
    return {
      formValues: { ...this.values },
      validations: {
        nome: value => (!value ? 'Nome é obrigatório' : ''),
        img: value => (!value ? 'Link de imagem é obrigatório' : '')
      }
    };
  },
  computed: {
    modelValueArray() {
      // Converte o valor para um array
      return this.modelValue.split(',').map(item => item.trim());
    }
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

  methods: {
    handleSave(formData) {
      this.onSave(formData);
    },

    updateObjects(objects) {
      // Atualize o valor do modelValue conforme necessário
      this.modelValue = objects.join(', ');
    }
  },

  mounted() {
    // Initialize formValues with props.values
    this.formValues = { ...this.values };
  }
};
</script>