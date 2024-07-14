<template>
    <div>
      <label class="d-flex" :for="name">{{ label }}</label>
      <input type="date" :id="name" :name="name" :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"/>
    </div>
  </template>
  
  <script>
  export default {
    name: 'DateInput',
    props: {
      label: String,
      name: String,
      modelValue: String,
    },
  };
  </script>
  