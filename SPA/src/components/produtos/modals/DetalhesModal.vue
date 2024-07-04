<template>
  <div class="boxAll">
    <div>
      <label class="box-title">{{ title }}</label>

      <button
        class="close-modal-button"
        @click="$emit('toggleModal', items.id)"
        :id="items.id"
      >
        <i class="bi bi-x-lg"></i>
      </button>
    </div>

    <div class="modal-body">
      <label class="box-label">{{ title }}</label>
      <input class="box-input" :value="value" disabled />
    </div>
  </div>
</template>

<script>
export default {
  props: {
    items: {
      type: Array,
      required: true,
    },
    value: {
      type: String,
      required: false,
    },
    fields: {
      type: Object,
      required: true,
    },
  },
};
</script>

<style>
.box-title {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-left: 4%;
  margin-right: 4%;
  margin-top: 4%;
}

.box-label {
  font-size: 15px;
  color: #858585;
  font-weight: bold;
  margin-bottom: 0.5em;
}

.box-input {
  width: 100%;
  background-color: #eee;
  border: none;
  padding: 0.5em;
  font-size: 15px;
  color: #8d8d8d;
  border-radius: 5px;
  box-sizing: border-box;
}

.boxAll {
  position: absolute;
  background-color: white;
  border: 0.2vh solid #d3d6db;
  z-index: 1;
  border-radius: 10px;
  top: 25%;
  left: 65%;
  width: 32%;
  height: auto;
  font-weight: bold;
  color: #808080;
}

.closeButton {
  text-align: right;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  width: 3vw;
  background-color: transparent;
  padding: 1vh 0.1vw;
}

.close-modal-button {
  border: none;
  color: black;
  background-color: white;
  cursor: pointer;
  margin-top: -4%;
}

.close-modal-button:hover {
  color: red;
}

#modal-body {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.linha-horizontal {
  width: 100%;
  border-bottom: 2px solid #dadada;
  margin: 20px auto;
  margin-bottom: 10px;
}

.inputFachada {
  height: 7vh;
  border: none solid #662222;
  background-color: #e7e7e7;
  color: #808080;
  border-radius: 1vh;
  padding: 1vh;
  text-align: justify;
}
</style>
