<template>
    <div class="DefaultForm">
      <div class="ml-4 mr-4" style="text-align: justify;">
        <div class="alert alert-danger mt-4" v-if="errors.length">
          <ul class="mb-0">
            <li v-for="(error, index) in errors" :key="index">
              {{ error }}
            </li>
          </ul>
        </div>
        <form @submit.prevent="handleSubmit" novalidate>
          <slot :formValues="formValues" :updateFormValue="updateFormValue"></slot>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" :style="{ height: '7vh', marginTop: '3vh', marginLeft: '5.5vh', fontSize: '3vh'}">
              {{ submitLabel }}
            </button>
          </div>
        </form>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'DefaultForm',
    props: {
      title: String,
      values: Object,
      validations: Object,
      onSave: Function,
      submitLabel: String
    },
    data() {
      return {
        formValues: { ...this.values },
        errors: []
      };
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
      updateFormValue(name, value) {
        this.formValues[name] = value;
      },
      handleSubmit() {
        this.errors = [];
        for (const [field, validation] of Object.entries(this.validations)) {
          const error = validation(this.formValues[field]);
          if (error) {
            this.errors.push(error);
          }
        }
        if (!this.errors.length) {
          this.onSave(this.formValues);
        }
      }
    }
  };
  </script>

  <style scoped>

  button{
    background-color: #2c9aff;
    color: white;
  }

  </style>
  