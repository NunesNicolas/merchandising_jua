<template>
  <DefaultForm :values="formValues" :validations="validations" :onSave="handleSave" :submitLabel="submitLabel">
    <template v-slot="{ formValues, updateFormValue }">
      <h1>{{ title }}</h1>
      <hr>
      <TextInput label="Nome" name="nome" :modelValue="formValues.nome"
        @update:modelValue="updateFormValue('nome', $event)" />
        <CheckBox label="Pesos" :items="weights" name="weights" @update:objects="updateObjects" :modelValue="formValues.weights"
        @update:modelValue="updateFormValue('weights', $event)" />
        <ImageUploadInput label="Imagem" name="img" :modelValue="formValues.img" 
        @update:modelValue="updateFormValue('img', $event)"/>
    </template>
  </DefaultForm>
</template>

<script>
import DefaultForm from '../../components/form/DefaultForm.vue';
import TextInput from '../../components/form/TextInput.vue';
import SelectInput from '../../components/form/SelectInput.vue';
import ImageUploadInput from '../../components/form/ImageUploadInput.vue';
import CheckBox from '../../components/form/CheckBox.vue';


export default {
  name: 'Form',
  components: {
    DefaultForm,
    TextInput,
    SelectInput,
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