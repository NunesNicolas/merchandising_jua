<script setup>
import axios from "axios";
</script>

<template>
    <div class="roteiro-info">
        <h5 class="text-3xl font-bold underline">Roteiro Concluidos <i class="bi bi-bookmark-check"></i> </h5>
        <div class="containercards" v-for="visita in visitas">
          <VisitasCard :visita="visita" :cliente="visita.cliente">
            <slot>
              <button  @click="routerButton(visita);"
                :class="[getButtonClass(visita.routeName)]">
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



export default {
  data() {
    return {
    //   id: this.$route.params.id,
      visitas: [],
      lastpesquisas: [],
    };
  },

  methods: {
    iniciar() {

      const promoter = JSON.parse(localStorage.getItem('promoter'));

      axios
        .get("/pesquisas/finals/" + promoter?.id)
        .then((response) => {
          const visitasData = response.data;
          this.visitas = Object.entries(visitasData).map(([key, visita]) => ({
            ...visita,
            routeName: visita.status === 'CONCLUIDO' ? "Concluido" : null
          }));
        })
        .catch((error) => {
          console.error(error);
        });
    },

    routerButton(visita) {
  this.$router.push({ name: 'pesquisa', params: { pesquisaid: visita.id } });
},

    getButtonClass(routeName) {
      switch (routeName) {
        case "Concluido":
          return "button-default";
      }
    },
  },

  computed() {},

  mounted() {
    this.iniciar();
  },

  components: {
    VisitasCard,
    ActionRouter,
    ActionListWrapper,
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
  background-color: rgb(246, 246, 246);
  padding-bottom: 8vh;
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
}</style>