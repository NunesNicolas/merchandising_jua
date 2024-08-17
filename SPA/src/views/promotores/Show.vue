<script setup>
import axios from "axios";

</script>

<template>
  <Breadcrumb pageTitle="Promotor" routeInfo="Info / Promotor" />
  <ActionListWrapper>
    <ActionRouterBack />
  </ActionListWrapper>


  <section style="
      display: flex;
      flex-wrap: wrap;
      width: 100%;
      justify-content: space-evenly;
      padding-top: 1vh;
      color: #858585;
      font-weight: bold;
      padding-left: 20px;
      padding-right: 20px;
    ">
    <div class="d-flex" style="
        height: 100%;
        justify-content: space-between;
        padding: 15px;
        width:100%;
        padding-top: 0;
      ">
      <div style="width: 25%;">
        <CardList :thisuser="true" :textBox="true" :item="promotor" :fields="{
          nome: 'Promotor',
          email: 'Email',
          status: 'status',
        }">
          <template v-slot:topactions="{ item }">
            <RouterLink :to="{
              name: 'UpdatePromotores',
              params: { id: this.$route.params.id },
            }">
              <i class="bi bi-pencil-square" style="font-size: 3.5vh; text-align: right;color:blue"></i>
            </RouterLink>
          </template>
        </CardList>
      </div>

      <div class="" style="
          padding: 0;
          margin: 0;
          width: 30%;
          height: 50vh;
          flex-wrap: wrap;
          padding-left: 2.5%;
        ">
        <BoxMedium title="tempo médio de atendimento" subtitle="ultimo atendimento">
          <template v-slot:icon="{ item }">
            <i class="bi bi-clock-history" style="color: green"></i>
          </template>
        </BoxMedium>

        <BoxMedium style="margin-top: 13%;" title="Quantidade de atendimentos no mês">
          <template v-slot:icon="{ item }">
            <i class="bi bi-calendar-date" style="color: blue"></i>
          </template>
          <template v-slot:actions="{ item }">
            <h2>{{ this.atendimentosNoMes }}</h2>
          </template>
        </BoxMedium>
      </div>

      <!-- card direita -->
      <div style="display: grid; width: 50%">
        <TableGrafic title="Atendimento dos ultimos 30 dias" content="Grafico">
        </TableGrafic>

        <div style="width: 100%; text-align: end; padding-top: 10px">
          <ActionRouter route="/clientes/create" color="primary" label="Adicionar Cliente" />
        </div>
      </div>
    </div>

    <!-- teste figma -->

    <div class="d-flex" style="
        width: 100%;
        height: 58vh;
        justify-content: space-evenly;
        flex-wrap: wrap;
        color: #858585;
        font-weight: bold;
      ">
      <TableInfo title="VISITAS DO PROMOTOR" :items="lastpesquisas" :fields="{
        nome: 'Promotor',
        checkin: 'Check-in',
        checkout: 'Checkout',
      }"></TableInfo>

      <TableInfo title="ROTEIRO DO PROMOTOR" :items="onlyClients()" :fields="{
        nome: 'CLIENTE',
        endereco: 'Endereço',
        checkout: 'ÚLTIMA VISITA',
      }">
        <template v-slot:tableactions="{ table }">
          <i class="bi bi-pencil-square"
            style="font-size: 3.5vh; color: blue; padding-inline: 0.5vw; cursor: pointer;"></i>
        </template>
        <template v-slot:itemactions="{ item }">
          <router-link :to="{
            name: 'ShowClientes',
            params: { id: item.clienteid },
          }" class="d-flex flex-wrap">
            <i class="bi bi-file-earmark-text" style="font-size: 25px;"></i>
          </router-link>
        </template>
      </TableInfo>
    </div>
  </section>
</template>

<script>
import TableInfo from "../../components/Box/BoxInfoTable.vue";
import TableGrafic from "../../components/Box/BoxGrafic.vue";
import CardList from "../../components/CardIconList.vue";
import BoxMedium from "../../components/Box/BoxinfoMedium.vue";
import ActionListWrapper from "../../components/ActionListWrapper.vue";
import ActionRouter from "../../components/ActionRouter.vue";
import Breadcrumb from '../../components/Breadcrumb.vue';
import ActionRouterBack from "../../components/ActionRouterBack.vue";
import { RouterLink } from "vue-router";

export default {
  data() {
    return {
      id: this.$route.params.id,
      promotor: "",
      promotores: [],
      lastpesquisas: [],
      atendimentosNoMes: '',
      clientes: [
        {
          id: 1,
          cnpj: "12345678901234",
          nome: "Cliente A",
          ultima_visita: "2023-05-15",
        },
        {
          id: 2,
          cnpj: "98765432109876",
          nome: "Cliente B",
          ultima_visita: "2023-05-10",
        },
        // Adicione mais clientes conforme necessário
      ],
    };
  },

  methods: {
    async getPromotores() {
      let response = axios.get("/promotores/" + this.id);
      this.promotor = (await response).data.promotor;
      this.promotores.push(this.promotor);
    },

    async fetchPesquisas() {
      let response = axios.get("/pesquisas/finals/" + this.id);
      const cache = (await response).data
      console.log(cache)
      this.lastpesquisas = cache.slice(0, 5).map(pesquisa => ({
        id: pesquisa.id,
        nome: pesquisa.cliente.nome,
        checkin: pesquisa.checkin_datetime,
        checkout: pesquisa.checkout_datetime,
        endereco: pesquisa.cliente.endereco,
        clienteid:  pesquisa.cliente.id
      }));
      const thirtyDaysAgo = new Date(Date.now() - 30 * 24 * 60 * 60 * 1000);
      const recentCheckouts = this.lastpesquisas.filter(pesquisa => {
        const checkoutDate = new Date(pesquisa.checkout);
        return checkoutDate >= thirtyDaysAgo;
      });
      this.atendimentosNoMes = recentCheckouts.length;
    },

    onlyClients() {
      return this.lastpesquisas.filter((pesquisa, index, self) => {
        return self.findIndex((p) => p.cliente_id === pesquisa.cliente_id) === index;
      });
    },
  },

  mounted() {
    this.getPromotores();
    this.fetchPesquisas();
  },
};
</script>

<style scoped>
i{
  color: blue;
}
h1 {
  margin-top: -30px;
}
</style>
