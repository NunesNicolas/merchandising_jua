<template>
  <DefaultForm :values="formValues" :validations="validations" :onSave="handleSave" :submitLabel="submitLabel">

    <template v-slot="{ formValues, updateFormValue }">
      <h1>{{ title }}</h1>
      <hr>
      <label>Produto referente: {{ produto.nome }} {{ produto.weight }}</label>
      <TextInput label="Nome do Produto" name="nome" :modelValue="formValues.nome"
        @update:modelValue="updateFormValue('nome', $event)" />
      <TextInput label="Marca Concorrente" name="brand" :modelValue="formValues.brand"
        @update:modelValue="updateFormValue('brand', $event)" />
    </template>
  </DefaultForm>
</template>

<script>
import axios from "axios";
import DefaultForm from '../../../components/form/DefaultForm.vue';
import TextInput from '../../../components/form/TextInput.vue';
import SelectInput from '../../../components/form/SelectInput.vue';
import ImageUploadInput from '../../../components/form/ImageUploadInput.vue';



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
      id: this.$route.params.id,
      produto: '',
      validations: {
        nome: value => (!value ? 'Nome é obrigatório' : ''),
        brand: value => (!value ? 'Uma Marca é obrigatório' : '')
      }
    };
  },
  methods: {
    handleSave(formData) {
      this.onSave(formData);
    },
    async getProdutos() {
      let response = axios.get("/produtos/" + this.id);
      this.produto = (await response).data.produto;
      this.formValues.product_id = this.produto.id;
    },
  },
  mounted() {
    this.getProdutos();
  }
};
</script>