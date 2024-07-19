<template>
    <div class="SaveCancel">
        <RegistroCamp/>
    </div>
</template>

<script>
    import RegistroCamp from "../../components/RegistroComp.vue";
    export default {
    components: {
        RegistroCamp,
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
    .SaveCancel .butArea{
        background-color: transparent;
    }
</style>