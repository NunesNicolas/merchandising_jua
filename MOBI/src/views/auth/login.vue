<template>
    <section>
        <div class="view">
            <img src="../../assets/nova-logo.png">
            <input type="textarea">
            <input tyope="password">
            <a href="">Esqueci minha senha</a>
            <button>Entrar</button>
        </div>
    </section>
</template>

<script>
export default {
    
}
</script>

<style>
    section{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        height: 100vh;
        width: 100%;
        background-color: #2C9AFF;
    }
    .view{
        display: flex;
        flex-wrap: wrap;
        justify-content: space-evenly;
        align-items: center;
        width: 100%;
        height: 80vh;
    }
    .view img{
        width: 70vw;
        height: 30vh;
    }
    .view input{
        width: 80vw;
        background-color: #fff;
        height: 8vh;
        color: #000;
        border: none;
        border-radius: 1.5vh;
        box-shadow: 0vh 0vh 1vh 0vh #000;
    }
    .view a{
        color: #fff;
        text-decoration: underline;
    }
    .view button{
        width: 40vw;
        margin-inline: 10vw;
        background-color: transparent;
        border: 0.1vh solid #fff;
        box-shadow: 0vh 0vh 1vh 0vh #000;
    }
</style>