<template>
    <div style="background-color: #ffffff;">
        <headerEmpresa/>
        <div class="tamanho">
            <researchField/>
            <researchField/>
            <researchField/>
            <researchField/>
        </div>
        <SaveAndCancel/>
    </div>
</template>

<style>
.tamanho{
    padding-bottom: 20vh;

}

div .butArea{
    box-shadow: 0.0vh 0.0vh 0.9vh 0.0vh #979797;
    background-color: #D9D9D9;
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