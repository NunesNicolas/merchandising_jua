<template>
    <div class="visitasCard">
        <div style="">  
          <h6>Cariri Shopping</h6>
          <p>Endereço: Rua alguma 289 <br> Ultima Visita: 12/12/12</p>
        </div>
        <button>Checkout</button>
      </div>
</template>
<style>
.visitasCard{
    width: 90vw;
    background-color: #f0f0f0;
    display: flex;
    flex-wrap: wrap;
    height: 15vh;
    margin-inline: 5vw;
    margin-top: 5vh;
    border-radius: 1vh;
}
.visitasCard div h6{
    background-color: #d0d0d0;
    height: 5vh;
    display: flex;
    flex-wrap: wrap;
    justify-content: start;
    align-items: center;
    border-radius: 1vh 0vh 0vh 0vh;
}
.visitasCard div{
    display: flex;
    flex-wrap: wrap;
    width: 70%;
    height: 15vh;
}
  .visitasCard div p, h6{
    margin: 0;
    width: 100%;
    text-align: start;
    padding-inline: 1vw;
}
  .visitasCard p{
    height: 10vh;
    font-size: 2.5vh;
}
  .visitasCard button{
    width: 30%;
    font-size: 2vh;
    height: 15vh;
    border-radius: 0 1vh 1vh 0vh;
    background-color: #2C9AFF;
}
</style>