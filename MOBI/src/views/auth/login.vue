<template>
    <section>
        <div class="view">
            
            <img src="../../assets/nova-logo.png">
            <div class="login">
                <input type="textarea" placeholder=" Nome de Usuário">
                <input type="password" placeholder=" Senha">
            </div>
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
    #app{
        padding-bottom: 0;
    }
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
        height: 70vh;

    }
    .view img{
        width: 60vw;
        height: 17vh;
        margin-top: 22vh;
        margin-bottom: 3vh;
    }
    .login{
        height: 10%;
        width: 100%;
    }
    .login input{
        margin-bottom: 20px;
        width: 75%;
        background-color: #fff;
        height: 6vh;
        color: #000;
        border: none;
        border-radius: 1.5vh;
        box-shadow: 0vh 0vh 0.5vh 0vh #000;
        padding-inline-start: 3vw;
    }
    .view a{  
        display: flex;
        justify-content: center;
        text-align: left;
        margin-right: 40vw;
        margin-top: 7vh;
        color: #fff;
        text-decoration: underline;
    }
    .view button{
        width: 35%;
        margin-inline: 10%;
        background-color: transparent;
        border: 0.1vh solid #fff;
    }
</style>