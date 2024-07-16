<template>
    <headerEmpresa/>
    <researchField/>
    <researchField/>
    <researchField/>
    <SaveAndCancel/>
</template>

<style>
    .space{
        width: 100%;
        height: 19vh;
    }
</style>

<script>
import headerEmpresa from "../../components/headerEmpresa.vue";
import researchField from "../../components/researchField.vue";
import SaveAndCancel from "../../components/SaveAndCancel.vue";

export default {
    components: {
        headerEmpresa,
        researchField,
        SaveAndCancel
    }
}
</script>