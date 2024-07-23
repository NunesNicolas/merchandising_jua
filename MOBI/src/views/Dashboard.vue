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

          <button @click="RouterButton(visita.id)" class="routerbutton">Check-in</button>

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
      // visita: {
      //     data: '12/01/12'
      // },
      cliente: {
        nome: 'nome exemplo',
        endereco: 'endereco exemplo',
      },
      visitas: [],
    }
  },


  methods: {
    async iniciar() {
      let response = axios.get('/pesquisas/promotor/' + 1);
      this.visitas = (await response).data;
    },

    RouterButton(id){
      this.$router.push({ name: 'checkin', params: { pesquisaid: id} });
    }
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
</style>
