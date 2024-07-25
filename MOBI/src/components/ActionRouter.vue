<template>
    <router-link :to="route">
      <button :class="['btn', colorClass]" style="border-radius: 10px;">
        <span>{{ label }}</span>
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
        default: 'btn-primary' // cor padrão do botão
      },
      label: {
        type: String,
        required: true
      }
    },
    computed: {
      colorClass() {
        return `btn-${this.color}`; // concatena 'btn-' com a cor para definir a classe do botão
      }
    }
  };
  </script>
  
  <style>
  </style>