<template>
    <div style="background-color: #ffffff;">
        <headerEmpresa/>
        <div class="tamanho">
            <researchField/>
            <researchField/>
            <researchField/>
            <researchField/>
        </div>
    </div>
</template>

<style>
.tamanho{
    padding-bottom: 20vh;
}


</style>

<script>
import headerEmpresa from "../../components/headerEmpresa.vue";
import researchField from "../../components/researchField.vue";

export default {
    components: {
        headerEmpresa,
        researchField,
    }
}
</script>