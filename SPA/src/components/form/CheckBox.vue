<template>
    <table>
        <h5>{{ label }}</h5>

        <div class="form-check" v-for="item in items">
            <label class="form-check-label">
                <input :checked="modelValue.some(obj => obj === item || Object.keys(obj).every(key => obj[key] === item[key]))" :id="item" :name="item" :value="item" class="form-check-input" type="checkbox"
                    @change="updateObjects(item, $event)">
                {{ item }}
            </label>
        </div>
    </table>
</template>

<script>
export default {
  name: 'CheckBox',
  props: {
    label: String,
    modelValue: Array,
    items: Array,
  },
  methods: {
    updateObjects(object, event) {
      if (event.target.checked) {
        this.modelValue.push(object);
      } else {
        const index = this.modelValue.findIndex(obj => {
          if (typeof obj === 'object' && typeof object === 'object') {
            return Object.keys(obj).every(key => obj[key] === object[key]);
          } else {
            return obj === object;
          }
        });
        if (index!== -1) {
          this.modelValue.splice(index, 1);
        }
      }
      this.$emit('input', this.modelValue);
    },
  },
}
</script>

<style scoped>
.form-check {
    margin-left: 10px;
    display: flex;
}

table {
    display: grid;
}
</style>