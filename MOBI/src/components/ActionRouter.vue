<template>
    <router-link :to="route">
      <button :disabled="disabled" :class="`btn-${color}`" style="border-radius: 10px;">
        <span>{{ label }}</span>
        <slot>
          
        </slot>
      </button>
    </router-link>
  </template>
  
  <script>
  export default {
    name: 'ActionRouter',
    props: {
      route: {
        type: String,
        required: true
      },
      color: {
        type: String,
        default: 'none' // cor padrão do botão
      },
      label: {
        type: String,
      },
      disabled: {
        type: Boolean,
        default: false
      }
    },
    computed: {
      colorClass() {
        if (color == 'none') {
          return 'none';
        }else{
        return `btn-${this.color}`; // concatena 'btn-' com a cor para definir a classe do botão
      }}
    }
  };
  </script>
  
  <style scoped>
button{
  width: auto;
}
  </style>