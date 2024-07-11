<template>
    <div class="action-list-wrapper">
        <slot></slot>
    </div>
</template>

<script>
export default {
    name: 'ActionListWrapper'
};
</script>

<style scoped>
.action-list-wrapper {
    text-align: right;
    margin-right: 20px;
    margin-top: 10px;
}
</style>