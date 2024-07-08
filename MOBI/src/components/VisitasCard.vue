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
    width: 85vw;
    background-color: #f0f0f0;
    display: flex;
    flex-wrap: wrap;
    height: 14vh;
    margin-inline: 8vw;
    margin-top: -5vh;
    border-radius: 1vh;
}
.visitasCard div h6{
    background-color: #d0d0d0;
    font-weight: bold;
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
    height: 13vh;
}
  .visitasCard div p, h6{
    margin: 0;
    width: 100%;
    text-align: start;
    padding-inline: 3vw;

}
  .visitasCard p{
    padding-top: 2vw;
    height: 9vh;
    font-size: 2.0vh;
}
  .visitasCard button{
    text-align: center;
    width: 30%;
    height: 14vh;
    border-radius: 0 1vh 1vh 0vh;
    background-color: #2C9AFF;
}
</style>