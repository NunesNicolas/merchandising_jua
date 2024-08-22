<script setup>
import axios from "axios";

</script>

<template>
  <Breadcrumb pageTitle="Detalhes Promotor" routeInfo="Info / Promotor / Detalhes" />
  <ActionListWrapper>
    <ActionRouterBack />
  </ActionListWrapper>


  <section style="
      display: flex;
      flex-wrap: wrap;
      width: 100%;
      justify-content: space-evenly;
      padding-top: 1.2vh;
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
      <div class="cardpromotor">
        <CardList :thisuser="true" :textBox="true" :item="promotor" :fields="{
          nome: 'Promotor',
          email: 'Email',
        }">
        
          <template v-slot:topactions="{ item }">
            <RouterLink :to="{
              name: 'UpdatePromotores',
              params: { id: this.$route.params.id },
            }">
            <div class="iconeed">
              <i class="bi bi-pencil-square"></i>
            </div>
            </RouterLink>
          </template>
        
        </CardList>
      </div>

      <!-- card direita -->
      <div style="display: flex; width: 85%">
       
        <TableInfo title="Visitas do Promotor" :items="lastpesquisas" :fields="{
          nome: 'Promotor',
          checkin: 'Check-in',
          checkout: 'Checkout',
        }"></TableInfo>
  
        <TableInfo title="Roteiro do Promotor" :items="onlyClients()" :fields="{
          nome: 'Cliente',
          endereco: 'Endereço',
          checkout: 'Última Visita',
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
      
    </div>
    <div style="width: 100%; text-align: end;margin-top: -45px">
      <ActionRouter route="/clientes/create" color="primary" label="Adicionar Cliente" />
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

.cardpromotor{
  margin-right: 4vh;
}

.iconeed{
  color: blue;
  font-size: 3.5vh;
  text-align: right;
  margin-right: 2vh;
}
</style>
