<template>
    <div class="form-group">
        <label :for="name">{{ label }}</label>
        <select class="form-control" :name="name" :value="modelValue"
            @change="$emit('update:modelValue', $event.target.value)">
            <option v-for="option in options" :key="option.value" :value="option.value">
                {{ option.text }}
            </option>
        </select>
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