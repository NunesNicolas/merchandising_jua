<template>
    <div id="separator" class="animate-fade-up">
        <label>Desenfetante 2L</label>
        <input type="text" id="desc" name="description" placeholder="Descreva as condições do produto">
        <p>Não Consta</p>
        <input type="checkbox" id="check" name="Check">
    </div>
    
</template>
<style>
    #separator{
        display: flex;
        flex-wrap: wrap;
        justify-content: end;
        align-items: center;
        width: 80vw;
        height: 12vh;
        margin-inline: 10vw;
        margin-top: 3vh;
        animation-name: animationStart;
        animation-duration: 1s;
    }
    @keyframes animationStart{
        0% {width: 0vw;};
        100% {width: 80vw;}
    }
    #separator label{
        text-align: start;
        width: 100%;
        height: 3vh;
        color: #b0b0b0;
        font-weight: bold;
        font-size: 2.5vh;

    }
    #separator input{
        background-color: #D9D9D9;
        color: black;
        border: none;
    }
    #desc{
        width: 100%;
        height: 5vh;
        border-radius: 1vh;
        padding-inline-start: 2vw;
        box-shadow: 0vh 0.2vh 0.3vh 0vh;

    }
    #check{
        width: 5vw;
        margin: 0;
        height: 5vh;
    }
    #separator p{
        width: 23vw;
        margin-top: 1.5vh;
        color: #b0b0b0;
    }
</style>
<script></script>