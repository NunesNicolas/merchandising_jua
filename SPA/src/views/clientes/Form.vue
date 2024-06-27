<template>
  <DefaultForm
    :title="title"
    :initialValues="formValues"
    :validations="validations"
    :onSave="handleSave"
    :submitLabel="submitLabel"
  >
    <template v-slot="{ formValues, updateFormValue }">
      <TextInput
        label="Nome"
        name="nome"
        :modelValue="formValues.nome"
        @update:modelValue="updateFormValue('nome', $event)"
      />
      <TextInput
        label="CNPJ"
        name="cnpj"
        :modelValue="formValues.cnpj"
        @update:modelValue="updateFormValue('cnpj', $event)"
      />
      <SelectInput
        label="Tipo"
        name="tipo"
        :modelValue="formValues.tipo"
        :options="tipoOptions"
        @update:modelValue="updateFormValue('tipo', $event)"
      />
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
    initialValues: Object,
    submitLabel: String,
    onSave: Function
  },
  data() {
    return {
      formValues: { ...this.initialValues },
      tipoOptions: [
        { value: 'tipo1', text: 'Tipo 1' },
        { value: 'tipo2', text: 'Tipo 2' }
      ],
      validations: {
        nome: value => (!value ? 'Nome is required' : ''),
        cnpj: value => (!value ? 'CNPJ is required' : '')
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
