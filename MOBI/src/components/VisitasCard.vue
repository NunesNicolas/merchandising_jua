<template>
  <div class="visitasCard">
    <div style="">
      <h6>{{ cliente.nome }}</h6>
      <p>{{ cliente.endereco }} <br> Ultima Visita:{{ visita.route_date }}</p>
    </div>
    <slot>

    </slot>
  </div>
</template>
<script>

export default {
  props: {
    visita: {
      type: Object,
      required: true
    },
    cliente: {
      type: Object,
      required: true
    }
  },


};
</script>
<style>
.visitasCard {
  width: 85vw;
  background-color: #ffffff;
  display: flex;
  flex-wrap: wrap;
  height: 14vh;
  margin-inline: 8vw;
  margin-top: -5vh;
  border-radius: 1vh;
  box-shadow: 0vh 0.2vh 0.2vh 0vh #d2d1d1;

}

.visitasCard div h6 {
  background-color: #e5e5e5;
  font-weight: bold;
  height: 5vh;
  display: flex;
  flex-wrap: wrap;
  justify-content: start;
  align-items: center;
  border-radius: 1vh 0vh 0vh 0vh;
}

.visitasCard div {
  display: flex;
  flex-wrap: wrap;
  width: 70%;
  height: 13vh;
}

.visitasCard div p,
h6 {
  margin: 0;
  width: 100%;
  text-align: start;
  padding-inline: 3vw;
}

.visitasCard p {
  height: 9vh;
  font-size: 2.0vh;
}

.visitasCard button {
  text-align: center;
  color: white;
  width: 30%;
  height: 14vh;
  border-radius: 0 1vh 1vh 0vh;
  padding: 0;
  margin: 0;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
}
</style>