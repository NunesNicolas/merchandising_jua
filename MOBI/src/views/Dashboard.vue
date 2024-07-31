<script setup>
import axios from "axios";
</script>

<template>
  <div class="roteiro-info">
    <div class="add-but">
      <ActionRouter route="/create" :color="'success'" label="Adicionar">
        <slot><i class="bi bi-plus-circle ml-2" style="font-size:20px"></i></slot>
      </ActionRouter>
    </div>
    <div class="ActionContainer">
      <h5 class="font-bold underline">Roteiro de Clientes</h5>
      <ActionRouter style="margin-top: 20px; margin-right: 30px" route="/sucess" :color="'primary'" label="">
        <slot><i class="bi bi-list-check" style="font-size:20px; "></i></slot>
      </ActionRouter>
    </div>
    <div class="containercards" v-for="visita in visitas">
      <VisitasCard :visita="visita" :cliente="visita.cliente">
        <slot>
          <button @click="RouterButton(visita.checkin_datetime, visita.id)" :class="[getButtonClass(visita.routeName)]">
            {{ visita.routeName }}
          </button>
        </slot>
      </VisitasCard>
    </div>
  </div>
</template>

<script>
import VisitasCard from "../components/VisitasCard.vue";
import ActionListWrapper from "../components/ActionListWrapper.vue";
import ActionRouter from "../components/ActionRouter.vue";
import ActionRouterBack from "../components/ActionRouterBack.vue";

export default {
  data() {
    return {
      visitas: [],
    };
  },

  methods: {
    iniciar() {

      const promoter = JSON.parse(localStorage.getItem('promoter'));

      axios
        .get("/pesquisas/promotor/" + promoter?.id)
        .then((response) => {
          const visitasData = response.data;
          this.visitas = Object.entries(visitasData).map(([key, visita]) => ({
            ...visita,
            routeName: visita.checkin_datetime ? "Continue" : "Check-in",
          }));
        })
        .catch((error) => {
          console.error(error);
        });
    },

    getButtonClass(routeName) {
      switch (routeName) {
        case "Continue":
          return "button-checkin";
        case "Check-in":
          return "button-pesquisa";
        default:
          return "button-default";
      }
    },

    RouterButton(checkin, id) {
      const routerName = checkin ? "pesquisa" : "checkin";
      this.$router.push({ name: routerName, params: { pesquisaid: id } });
    },
  },

  computed() { },

  mounted() {
    this.iniciar();
  },

  components: {
    VisitasCard,
    ActionRouter,
    ActionListWrapper,
    ActionRouterBack,
  },
};
</script>

<style scoped>
.containercards {
  margin-bottom: 70px;
}

.roteiro-info {
  text-align: center;
  justify-content: space-evenly;
  padding-bottom: 8vh;
  background-color: rgb(246, 246, 246);
}

.roteiro-info h5 {
  text-align: left;
  color: #a0a0a0;
  font-size: 2.5vh;
  margin-left: 40px;
  margin-top: 30px;
  margin-bottom: 8vh;
}

.add-but {
  text-align: left;
  padding-top: 20px;
  padding-left: 40px;
}

.button-checkin {
  background-color: #2c9aff;
  /* pink */
}

.button-pesquisa {
  background-color: #57be71;
  /* green */
}

.button-default {
  background-color: #2c9aff;
  /* default blue */
}

.ActionContainer {
  justify-content: space-between;
  display: flex;
  height: auto;
  row-gap: 20px;
}
</style>
