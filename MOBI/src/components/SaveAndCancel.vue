<template>
    <div class="space">
        <div class="butArea">
            <button class="save">Salvar</button>
            <button class="cancel">Cancelar</button>
        </div>
    </div>

    
</template>
<style>

    .space{
    background-color: #ffffff;
    width: 100%;
    height: 100%;
    }

    .butArea{
        width: 100%;
        height: 18vh;
        bottom: 8vh;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-evenly;
        align-items: center;
        position: fixed;
        padding-block: 1vh;
    }
    .butArea button{
        width: 60vw;
        height: 6vh;
        border-radius: 1vh;
        font-weight: bold;
        font-size: 3vh;
        padding: 0;
    }
    .save{
        background-color: #2C9AFF;
        color: #ffffff;
    }
    .cancel{
        background-color: #ffffff;
        color: #2C9AFF;
    }
</style>
<script></script>