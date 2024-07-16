<template>
    <RegistroCamp/>
    <SaveAndCancel/>
</template>

<script>
    import SaveAndCancel from "../../components/SaveAndCancel.vue";
    import RegistroCamp from "../../components/RegistroComp.vue";
    export default {
    components: {
        RegistroCamp,
        SaveAndCancel,
    }
}
</script>

<style>
    #app{
        padding-bottom: 0vh;
    }
    .page{
        background-color: #000000;
    }
    .butArea{
        background-color: transparent;
    }
    .save{
        background-color: #ffffff;
        color: #2C9AFF;
    }
    .cancel{
        background-color: #2C9AFF;
        color: #ffffff;
        border: solid #fff 0.3vh;
    }
    .space{
        width: 0;
        height: 0;
    }
</style>