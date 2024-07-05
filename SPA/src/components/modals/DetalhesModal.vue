<template>
  <div class="boxAll">
    <button
      class="close-modal-button"
     @click="closeModal(item.id)">
      <i class="bi bi-x-lg"></i>
    </button>
    <div>
      <label class="box-title">{{ title }}</label>
      {{ item }}
    </div>
    <div class="modal-body">
      <label class="box-label"></label>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    item: {
      type: Object,
      required: true,
    },
    value: {
      type: Boolean,
      required: false, // default value is false
    },
    fields: {
      type: Object,
      required: true,
    },
    title: {
      type: String,
      required: true,
    },
  },

  methods: {
    closeModal(id) {
      this.$emit('toggleModal', [id]);
      this.$emit('modificarEstilo')
  },
}
}
</script>