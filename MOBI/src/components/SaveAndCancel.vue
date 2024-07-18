<template>
    <div class="space">
        <div class="butArea">
            <div class="alert alert-danger mt-4" v-if="errors.length">
                <ul class="mb-0">
                  <li v-for="(error, index) in errors" :key="index">
                    {{ error }}
                  </li>
                </ul>
              </div>
              <form @submit.prevent="handleSubmit" novalidate>
              <slot :formValues="formValues" :updateFormValue="updateFormValue"></slot>
              
            <button type="submit" class="save">   {{ submitLabel }}  </button>
            <button type="button" class="cancel"> {{ nosubmit }} </button>
            
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
      submitLabel: String,
      nosubmit: String
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

<style>

    .space{
    background-color: #ffffff;
    width: 100%;
    height: 100%;
    }

    .butArea{
        width: 100%;
        height: 18vh;
        bottom: 8vh;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-evenly;
        align-items: center;
        position: fixed;
        padding-block: 1vh;
    }
    .butArea button{
        width: 60vw;
        height: 6vh;
        border-radius: 1vh;
        font-weight: bold;
        font-size: 3vh;
        padding: 0;
    }
    .save{
        background-color: #2C9AFF;
        color: #ffffff;
    }
    .cancel{
        background-color: #ffffff;
        color: #2C9AFF;
    }
</style>
<script></script>