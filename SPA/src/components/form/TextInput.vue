<template>
    <div class="form-group">
        <label :for="name">{{ label }}</label>
        <input type="text" class="form-control" :name="name" :value="modelValue"
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
    }
};
</script>