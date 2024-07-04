<template>
  <DefaultForm :values="formValues" :validations="validations" :onSave="handleSave" :submitLabel="submitLabel">
    <template v-slot="{ formValues, updateFormValue }">
      <h1>{{ title }}</h1>
      <hr>
      <TextInput label="Nome" name="nome" :modelValue="formValues.nome"
        @update:modelValue="updateFormValue('nome', $event)" />
      <CheckBox label="Pesos" :items="weights" name="weights"
        :modelValue="formValues.weights" @update:modelValue="updateFormValue('weights', $event)" />
      <ImageUploadInput label="Imagem" name="img" :modelValue="formValues.img"
        @update:modelValue="updateFormValue('img', $event)" />
    </template>
  </DefaultForm>
</template>

<script>
import DefaultForm from '../../components/form/DefaultForm.vue';
import TextInput from '../../components/form/TextInput.vue';
import ImageUploadInput from '../../components/form/ImageUploadInput.vue';
import CheckBox from '../../components/form/CheckBox.vue';

export default {
  name: 'Form',
  components: {
    DefaultForm,
    TextInput,
    ImageUploadInput,
    CheckBox,
  },
  data() {
    return {
      formValues: { ...this.values },
      validations: {
        nome: value => (!value ? 'Nome é obrigatório' : '')
      },
      weights: [
        '200g',
        '500g',
        '1kg',
        '5kg',
        '500ml',
        '1l',
        '2l',
        '5l',
      ],
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