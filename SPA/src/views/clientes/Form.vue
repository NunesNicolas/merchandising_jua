<template>
  <DefaultForm :title="title" :values="formValues" :validations="validations" :onSave="handleSave"
    :submitLabel="submitLabel">
    <template v-slot="{ formValues, updateFormValue }">
      <TextInput label="Nome" name="nome" :modelValue="formValues.nome"
        @update:modelValue="updateFormValue('nome', $event)" />
      <TextInput label="CNPJ" name="cnpj" :modelValue="formValues.cnpj"
        @update:modelValue="updateFormValue('cnpj', $event)" />
      <SelectInput label="estado" name="estado" :modelValue="formValues.estado" :options="estadoOptions"
        @update:modelValue="updateFormValue('estado', $event)" />
    </template>
  </DefaultForm>
</template>

<script>
import DefaultForm from '../../components/form/DefaultForm.vue';
import TextInput from '../../components/form/TextInput.vue';
import SelectInput from '../../components/form/SelectInput.vue';

export default {
  name: 'Form',
  components: {
    DefaultForm,
    TextInput,
    SelectInput
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
      estadoOptions: [
        { value: 'MA', text: 'Maranhão' },
        { value: 'CE', text: 'Ceará' },
        { value: 'PI', text: 'Piaui' }
      ],
      validations: {
        nome: value => (!value ? 'Nome é obrigatório' : ''),
        cnpj: value => (!value ? 'CNPJ é obrigatório' : '')
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
