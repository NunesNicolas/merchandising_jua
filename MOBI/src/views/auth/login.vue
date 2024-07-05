<template>
    <section>
        <div class="view">
            <img src="../../assets/nova-logo.png">
            <div class="info">
                <input type="textarea" placeholder=" Nome de Usuário">
                <input type="password" placeholder=" Senha">
            </div>
        </div>

        <a href="">Esqueci minha senha</a>

        <div class="bt">
            <div>
            
            </div>
            <div>
            <button>Entrar</button>
            </div>

        </div>
        
    </section>
</template>

<script>
export default {
    
}
</script>

<style>
    section{
        flex-wrap: wrap;
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
        height: 60%;
    }
    .view img{
        margin-top: -50px;
        margin-bottom: -200px;
        width: 60vw;
        height: 17vh;
    }
    .info{
        height: 10%;
        width: 100%;
    }
    .info input{
        margin-bottom: 20px;
        width: 75%;
        background-color: #fff;
        height: 100%;
        color: #000;
        border: none;
        border-radius: 1.5vh;
        box-shadow: 0vh 0vh 1vh 0vh #000;
    }
    a{  
        display: flex;
        margin-top: -30px;
        margin-left: 55px;
        justify-content: left;
        text-align: left;
        color: #fff;
        text-decoration: underline;
    }
    .bt{
        margin-top: 25px;
        text-align: center;
    }
    .bt button{
        width: 35%;
        margin-inline: 10%;
        background-color: transparent;
        border: 0.1vh solid #fff;
        box-shadow: 0vh 0vh 1vh 0vh #000;
    }
</style>