<script setup>
import axios from "axios";
</script>

<template>
  <div class="roteiro-info">

    <div class="add-but">
      <ActionListWrapper>
        <ActionRouter route="/create" color="primary" label="Adicionar" />
      </ActionListWrapper>
    </div>
    <h5 class="text-3xl font-bold underline">Roteiro de Clientes</h5>
    <div class="containercards" v-for="visita in visitas">
      <VisitasCard :visita="visita" :cliente="visita.cliente">
        <slot>

          <button @click="RouterButton(visita.checkin_datetime, visita.id)"
            :class="[getButtonClass(visita.routeName)]">{{ visita.routeName
            }}</button>

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
      visitas: []
    }
  },


  methods: {
    iniciar() {
      axios.get('/pesquisas/promotor/' + 1)
  .then(response => {
    const visitasData = response.data;
    this.visitas = Object.entries(visitasData).map(([key, visita]) => ({
      ...visita,
      routeName: visita.checkin_datetime ? 'Continue' : 'Check-in',
    }));
  })
  .catch(error => {
    console.error(error);
  });
  },

    getButtonClass(routeName) {
      switch (routeName) {
        case 'Continue':
          return 'button-checkin';
        case 'Check-in':
          return 'button-pesquisa';
        default:
          return 'button-default';
      }
    },

    RouterButton(checkin, id) {
      const routerName = checkin ? 'pesquisa' : 'checkin';
      this.$router.push({ name: routerName, params: { pesquisaid: id } });
    },
  },

  computed() {

  },

  mounted() {
    this.iniciar();
  },

  components: {
    VisitasCard,
  },
}

</script>

<style>
.containercards {
  margin-bottom: 70px;
}

.roteiro-info {
  text-align: center;
  justify-content: space-evenly;
}

.roteiro-info h5 {
  text-align: left;
  color: #a0a0a0;
  font-size: 2.5vh;
  margin-left: 40px;
  margin-top: 30px;
  margin-bottom: 8vh;
}

.add-but a {
  display: flex;
  justify-content: left;
  text-align: left;
  width: 50%;
  margin-left: 40px;
  margin-top: 2vh;
  color: #fff;
}

.button-checkin {
  background-color: #2C9AFF;
  /* pink */
}

.button-pesquisa {
  background-color: #57be71;
  /* green */
}

.button-default {
  background-color: #2C9AFF;
  /* default blue */
}
</style>
