<template>

    <div class="registro-card">
        <img src="https://blog.cobasi.com.br/wp-content/uploads/2018/08/hamster-anao-russo-capa-blog-cobasi.jpg">
        <div>
            <h5>TÍTULO DO REGISTRO</h5>
                <p>Categoria do Produto</p>
        </div>
        <i class="bi bi-trash" style="font-size: 25px; color: red"></i>
    </div>

</template>

<style>

.registro-card{
    margin-inline: 5%;
    flex-wrap: wrap;
    display: flex;
    background-color: #f0f0f0;
    color: #2C9AFF;
    width: 90%;
    height: 10vh;
    margin-top: 3vh;
    border-radius: 20px;
    box-shadow: 0vh 0.5vh 0.5vh 0.1vh #979797;
    text-align: left;
    align-items: center;
}

.registro-card img{
    margin-left: 10px;
    border-radius: 20px;
    width: 22%;
    height: 80%;
}

.registro-card h5 {
    font-weight: bold;
    font-size:medium;
    margin-left: 25px;
    margin-top: 10px;
}
.registro-card p {
    margin-left: 25px;
}
.registro-card i {
    margin-left: 60px;
}
    
</style>