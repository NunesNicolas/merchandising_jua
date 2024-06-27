<template>
    <div class="form-group">
        <label :for="name">{{ label }}</label>
        <select class="form-control" :name="name" :value="modelValue"
            @change="$emit('update:modelValue', $event.target.value)">
            <option value="" disabled selected hidden>Selecione...</option>
            <option v-for="option in options" :key="option.value" :value="option.value">
                {{ option.text }}
            </option>
        </select>
        <span v-if="!modelValue" class="text-muted">Por favor, selecione uma opção.</span>
    </div>
</template>

<script>
export default {
    name: 'SelectInput',
    props: {
        label: String,
        name: String,
        options: Array,
        modelValue: String
    }
};
</script>
