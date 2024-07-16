<template>
    <div class="RegistroComponents">
        <h2 class="newReg">Novo Registro</h2>
        <label>Titulo do Registro</label>
        <input type="text" class="tittle">
        <label>Selecionar Tipo de Registro</label>
        <select name="" id="">
            <option value="0">Tipo 1</option>
            <option value="1">Tipo 2</option>
            <option value="2">Tipo 3</option>
        </select>
        <label>Selecionar uma Imagem</label>
        <div class="img">
            <input class="form-control form-control-lg" type="file" accept=".png, .jpeg, .svg">
          </div>
    </div>

</template>
<script>
    
</script>
<style>
    .RegistroComponents{
        background-color: #2C9AFF;
        width: 100%;
        height: 100vh;
        position: fixed;
        padding-top: 5vh;
    }
    .RegistroComponents label{
        color: #ffffff;
        font-size: 2.5vh;
        width: 100%;
        text-align: start;
        padding-left: 5vw;
        margin-top: 7vh;
        margin-left: 5vw;
    }
    .newReg{
        color: #ffffff;
        width: 80%;
        height: 6vh;
        font-size: 200%;
        border-bottom: solid #ffffff 0.5vh;
        margin-left: 10vw;
        text-align: start;
    }
    .tittle, .RegistroComponents select, .img{
        background-color: #ffffff;
        border: none;
        width: 80%;
        height: 5vh;
        color: black;
        border-radius: 1vh;
        box-shadow: #000000 0vh 0.2vh 0vh 0.1vh;
        font-size: bold;
    }

    .img{
        color: #ffffff;
        width: 80%;
        height: 5vh;
        font-size: 200%;
        border-bottom: solid #ffffff 0.5vh;
        margin-left: 10vw;
        text-align: start;
    }
</style>