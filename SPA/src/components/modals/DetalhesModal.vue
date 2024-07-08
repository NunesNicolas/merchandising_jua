<template>
  <div class="boxAll">
    <div class="topModal">
      <h6>{{title}}</h6>
      <button class="close-modal-button" style="height: 100%;" @click="closeModal(item.id)">
      <i class="bi bi-x-lg"></i>
    </button>
    </div>
    <div class="bodyModal" v-for="(label, field) in fields">
      <div class="box-line">
        <BoxInfo :title="label" :value="item[field]"></BoxInfo>
    </div>
    </div>
    <slot></slot>
  </div>
</template>

<script>
import BoxInfo from '../../components/Box/BoxInfo.vue'
export default {
  props: {
    value: {
      type: Boolean,
      required: false, // default value is false
    },
    title: {
      type: String,
      required: true,
    },

    item: {
      type: Object,
      required: true,
    },

    fields: {
      type: Object,
      required: true,
    },

  },

  methods: {
    closeModal(id) {
      this.$emit('toggleModal', [id]);
      this.$emit('modificarEstilo')
    },
  },
  components: {
    BoxInfo,
  }
}
</script>

<style scoped>
.boxAll{
  padding: 15px;
}

.topModal{
  display: flex;
  justify-content: space-between;
}

</style>