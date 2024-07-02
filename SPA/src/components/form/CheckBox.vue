<template>
  <table>
    <h5>{{ label }}</h5>

    <div class="form-check" v-for="item in items">
       <label class="form-check-label">
      <input :id="item" :name="item" :value="item" class="form-check-input" type="checkbox"
        @change="$emit('update:modelValue', $event.target.value)">
        {{ item }}
      </label>
    </div>
  </table>
</template>

<script>
export default {
  name: 'CheckBox',
  data() {
    return {
      objects: []
    }
  },
  props: {
    label: String,
    modelValue: Array,
    items: Array
  },

  methods: {
    updateObjects(object, event) {
      if (event.target.checked) {
        this.$emit('update:objects', [...this.objects, object]);
      } else {
        const index = this.objects.indexOf(object);
        if (index > -1) {
          this.$emit('update:objects', this.objects.filter(item => item!== object));
        }
      }
      ;  
    }
  }
}
</script>

<style scoped>
.form-check{
  margin-left: 10px;
  display: flex;
}
table {
  display: grid;
}
</style>