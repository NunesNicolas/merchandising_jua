<template>
    <div class="container">
      <div v-for="(camp, field) in defaults" :key="field" class="round">
        <input
          type="checkbox"
          :id="field"
          :value="camp[label]"
          :checked="checkin(camp[label])"
          @change="update(camp, field)"
        />
        <label :for="field" class="circle">
          {{ camp[label] }}
        </label>
      </div>
    </div>
    <slot>
       
    </slot>
  </template>
  
  <script>
  export default {
    props: {
      defaults: Object,
      options: Array,
      instance: Object,
      value: String,
      label: String,
      finalize: Function,
    },
    data() {
      return {
        selectedOptions: [],
      };
    },
    created() {
      this.initializeSelectedOptions();
    },
    watch: {
      options: {
        handler(newOptions) {
          this.initializeSelectedOptions();
        },
        deep: true,
        immediate: true,
      },
    },
    methods: {
      initializeSelectedOptions() {
        this.selectedOptions = this.options.map(option => option[this.label]);
      },
      checkin(object) {
        return this.selectedOptions.includes(object);
      },
      update(camp, field) {
        const value = camp[this.label];
        const index = this.selectedOptions.findIndex(option => option === value);
  
        if (index === -1) {
          this.selectedOptions.push(value);
        } else {
          this.selectedOptions.splice(index, 1);
        }
  
        console.log(this.selectedOptions);
      },
    },
  };
  </script>
  
  <style scoped>
  .container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
  }
  
  .round {
    display: flex;
    align-items: center;
  }
  
  input {
    height: 40px;
  }
  
  .selected {
    font-weight: bold;
    color: #666;
  }
  </style>
  