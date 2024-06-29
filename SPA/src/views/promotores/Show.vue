<script setup>
import axios from "axios";
</script>

<template>
  <div class="d-flex" style="
      width: 100%;
      height: 5vh;
      justify-content: space-between;
      padding: 10px;
    ">
    <p class="ml-4 mr-auto" style="color: #858585; font-weight: bold; font-size: 2.2vh">
      Promotores
    </p>
    <p class="mr-3" style="color: #858585; font-weight: bold; font-size: 2.2vh">
      Dashboard / Promotores
    </p>
  </div>

  <router-link to="/promotores">
    <div class="d-flex" style="width: 100%; height: 4vh; justify-content: end; padding: 35px">
      <a href="" type="button" class="btn btn-light align-self-center" style="
          border-radius: 20px;
          border: solid #858585 0.2vh;
          color: #858585;
          font-weight: bold;
          font-size: 13px;
        ">
        VOLTAR
      </a>
    </div>
  </router-link>

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
        padding-top: 0;
      ">
      <CardList :items="promotores" :fields="{
        nome: 'Promotor',
        email: 'Email',
        status: 'status',
      }">
      </CardList>

      <div class="d-flex" style="
          padding: 0;
          margin: 0;
          width: 70%;
          height: 50vh;
          justify-content: space-evenly;
          flex-wrap: wrap;
        ">
        <BoxMedium title="tempo médio de atendimento" subtitle="ultimo atendimento">
          <template v-slot:icon="{ item }">
            <i class="bi bi-clock-history" style="color: green"></i>
          </template>
        </BoxMedium>
        <BoxMedium title="Quantidade de atendimentos no mês">
          <template v-slot:icon="{ item }">
            <i class="bi bi-calendar-date" style="color: blue"></i>
          </template>
        </BoxMedium>
        <BoxMedium title="Pesquisas feitas" subtitle="ultima pesquisa">
          <template v-slot:icon="{ item }">
            <i class="bi bi-list-check" style="color: red"></i>
          </template>
        </BoxMedium>
        <BoxMedium title="???">
          <template v-slot:icon="{ item }">
            <i class="bi bi-clock-history" style="color: blue"></i>
          </template>
        </BoxMedium>
      </div>

      <!-- card direita -->
      <div style="display: grid; width: 30%">
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
      <TableInfo title="VISITAS DO PROMOTOR" :items="promotores" :fields="{
        nome: 'Promotor',
        telefone: 'Telefone',
      }"></TableInfo>

      <TableInfo title="ROTEIRO DO PROMOTOR" :items="clientes" :fields="{
        cnpj: 'CNPJ',
        nome: 'CLIENTE',
        ultima_visita: 'ÚLTIMA VISITA',
      }">
        <template v-slot:tableactions="{ table }">
          <i class="bi bi-pencil-square" style="font-size: 25px; color: blue"></i>
        </template>
        <template v-slot:itemactions="{ item }">
          <router-link :to="{
            name: 'ShowClientes',
            params: { id: this.$route.params.id },
          }" class="d-flex flex-wrap">
            <i class="bi bi-file-earmark-text" style="font-size: 25px"></i>
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

export default {
  data() {
    return {
      id: this.$route.params.id,
      promotor: "",
      promotores: [],
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
  },

  mounted() {
    this.getPromotores();
  },
};
</script>

<style scoped></style>
