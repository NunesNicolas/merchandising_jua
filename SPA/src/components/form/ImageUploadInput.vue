<template>
  <div>
    <label for="imageUploadInput" class="btn btn-primary">
      Selecionar Imagem
      <input id="imageUploadInput" @change="handleImage" class="image-upload-input" type="file" accept="image/*"
        style="display: none;">
    </label>

    <!-- Preview da imagem -->
    <div v-if="image" class="mt-3">
      <img :src="image" alt="Preview da imagem" style="max-width: 100%; max-height: 300px;">
    </div>

    <!-- Mostrar URL remota após o upload -->
    <div v-if="remoteUrl" class="mt-3">
      <p>URL Remota da Imagem: <a :href="remoteUrl" target="_blank">{{ remoteUrl }}</a></p>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'ImageUploadInput',
  props: {
    modelValue: String  // Propriedade para armazenar a URL base64 da imagem
  },
  data() {
    return {
      image: '',
      remoteUrl: ''
    }
  },
  methods: {
    handleImage(e) {
      const selectedImage = e.target.files[0]; // Obtenha o primeiro arquivo selecionado
      if (selectedImage) {
        this.createBase64Image(selectedImage);
      }
    },
    createBase64Image(fileObject) {
      const reader = new FileReader();

      reader.onload = (e) => {
        this.image = e.target.result; // Atribui a URL base64 à variável image
        this.$emit('update:modelValue', e.target.result); // Emite evento com a URL base64
      };

      reader.readAsDataURL(fileObject); // Lê o arquivo como URL base64
    }
  },
  watch: {
    // Monitora mudanças na propriedade modelValue (URL base64 inicial)
    modelValue: {
      immediate: true,  // Executa o handler imediatamente na inicialização
      handler(newVal) {
        if (newVal) {
          this.image = newVal;  // Define a imagem inicial
        }
      }
    }
  }
};
</script>

<style scoped>
/* Estilos opcionais para personalização */
.image-upload-input {
  display: none;
}
</style>
