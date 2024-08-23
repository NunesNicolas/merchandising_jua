<template>
  <div class="container">
    <div v-for="(camp, field) in defaults" :key="field" class="form-check form-switch mr-2">
      <input class="form-check-input" type="checkbox" :id="field" :value="camp[label]" :disabled="disableInit(camp[label])" :checked="checkin(camp[label])"
        @change="update(camp, field)" />
      <label :for="field" class="circle">
        {{ camp[label] }}
      </label>
    </div>

  </div>
  <div class="containerBt">
  <slot>
  </slot>
  <button style="background-color: #2c9aff;" @click="this.$emit('util', this.selectedOptions)">Atualizar</button>
</div>

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
      initialOptions: [],
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

    disableInit(object){
      if (this.initialOptions.length === 0) {
        this.initialOptions = [...this.selectedOptions];
    }
    return this.initialOptions.includes(object);
  },

    update(camp, field) {
      const value = camp[this.label];
      const index = this.selectedOptions.findIndex(option => option === value);

      if (index === -1) {
        this.selectedOptions.push(value);
      } else {
        this.selectedOptions.splice(index, 1);
      }
    },
  },
};
</script>

<style scoped>
button{
  margin: 10px;
}
.container {
  display: flex;
  flex-wrap: wrap;

}
.containerBt{
  display: flex;
  flex-wrap: wrap;
  margin-top: 10px;
}

.round {
  display: flex;
  align-items: center;
}

.selected {
  font-weight: bold;
  color: #666;
}
</style>