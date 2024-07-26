<script setup>
import axios from "axios";
</script>

<template>
    <div class="roteiro-info">
        <h5 class="text-3xl font-bold underline">Roteiro Concluidos <i class="bi bi-bookmark-check"></i> </h5>
        <div class="containercards" v-for="visita in visitas">
          <VisitasCard :visita="visita" :cliente="visita.cliente">
            <slot>
              <button
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
      axios
        .get("/pesquisas/finals/" + 1)
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