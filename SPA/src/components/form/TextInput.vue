<template>
    <div class="form-group">
        <label :for="name">{{ label }}</label>

        <div v-if="name === 'senha'" style="display: flex;">
        <input v-if="name === 'senha'" type="password" class="form-control" :name="name" :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)" :placeholder="'Digite um ' + label" >
        <i id="eyeicon" class="bi bi-eye-fill" @click="mostrarSenha" style="font-size: 30px; margin-left:-40px"></i>
        </div>
        
        <input v-else type="text" class="form-control" :name="name" :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)" :placeholder="'Digite um ' + label" />
    </div>
</template>

<script>
export default {
    name: 'TextInput',
    props: {
        label: String,
        name: String,
        modelValue: String
    },

methods: {
    mostrarSenha() {
  const input = document.querySelector('input[name="senha"]');
  const icon = document.querySelector('i#eyeicon');
  if (input.type === "password") {
    input.type = "text";
    icon.classList.remove('bi-eye-fill');
    icon.classList.add('bi-eye-slash-fill');
  } else {
    input.type = "password";
    icon.classList.remove('bi-eye-slash-fill');
    icon.classList.add('bi-eye-fill');
  }
}
}
};
</script>