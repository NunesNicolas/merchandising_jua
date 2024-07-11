<script setup>
import axios from "axios";
</script>

<template>
  <div class="info">
    <ActionListWrapper>
      <ActionRouter route="/create" color="primary" label="Adicionar" />
    </ActionListWrapper>
    <h5>Roteiro de Clientes</h5>
    <VisitasCard />
  </div>
</template>

<script>
import VisitasCard from "../../components/VisitasCard.vue";
import ActionListWrapper from "../../components/ActionListWrapper.vue";
import ActionRouter from "../../components/ActionRouter.vue";
import ActionRouterBack from "../../components/ActionRouterBack.vue";

export default {
  components: {
    VisitasCard,
  },
};
</script>

<style>
.info {
  text-align: center;
  justify-content: space-evenly;
}

.info h5 {
  text-align: left;
  color: #a0a0a0;
  font-size: 2.5vh;
  margin-left: 40px;
  margin-top: 50px;
  margin-bottom: 8vh;
}
</style>
