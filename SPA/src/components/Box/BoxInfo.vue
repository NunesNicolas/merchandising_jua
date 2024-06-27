<template>
    <div class="box-info">
        <label class="box-label">{{ title }}</label>
        <input class="box-input" :value="value" disabled />
    </div>
</template>

<script>
export default {
    name: 'BoxInfo',
    props: {
        title: {
            type: String,
            required: true
        },
        value: {
            type: String,
            required: false
        }
    }
};
</script>

<style scoped>
.box-info {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    width: 100%;
    margin-bottom: 1em;
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
</style>