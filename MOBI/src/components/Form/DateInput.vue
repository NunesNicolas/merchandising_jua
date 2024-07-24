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
  <style scoped>
  input{
    text-align: center;
    font-size: large;
    font: bold;
    color: rgb(43, 43, 43);
    background-color: white;
    border-radius: 10px;
    height: 45px;
    width: 50%;
    border: 0.1vh solid rgb(206, 206, 206);
  }
  input[type="date"]::-webkit-calendar-picker-indicator {
    filter: invert(100%);
    font-size: 160%;
    background-position: center;
    background-repeat: no-repeat;
    cursor: pointer;
  }

</style>
  