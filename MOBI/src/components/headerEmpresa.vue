<template>
    <header class="header-empresa">
        <div>
            <h6>Cliente:</h6>
            <p>Cariri Garden Shopping</p>
            <h6>Endereço:</h6>
            <p>Rua, Avenida Ailton Gomes</p>
            <h6>Tempo de Pesquisa:</h6>
            <p>2h e 35min e 45s</p>
        </div>
        <img src="../assets/nova-logo.png">
    </header>
</template>

<style>
    .header-empresa {
        display: flex;
        flex-wrap: wrap;
        width: 100%;
        height: 24vh;
        background-color: #2C9AFF;
        color: #ffffff;
        align-items: center;
        position: fixed;
        z-index: 1;
    }
    .header-empresa div{
        display: flex;
        flex-wrap: wrap;
        width: 60%;
        height: 100%;
        padding-left: 5vw;
        padding-top: 3vh;
        padding-bottom: 1vh;
        text-align: start;

    }
    .header-empresa img{
        width: 25vw;
        height: 8vh;
        margin-left: 10vw;
        margin-bottom: 12vh;
    }
    .header-empresa div h6{
        width: 100%;
        font-weight: bold;
        padding: 0;
    }
</style>

<script>
</script>