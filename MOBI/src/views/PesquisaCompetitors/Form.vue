<template>
  <div class="FormCompetitor">
    <headerEmpresa :visita="pesquisa" />
    <div class="add-but">
      <ActionRouter
        :route="{ name: 'pesquisa', params: { pesquisaid: id } }"
      >
        <slot
          ><i
            class="bi bi-arrow-left-square icon-right"
            title="Voltar"
            style="font-size: 25px; background-color: white"
          ></i
        ></slot>
      </ActionRouter>
      <h5 class="name">Pesquisa Concorrentes</h5>
    </div>

    <div v-for="competitor in competitors">
      <researchField
        @preencher="adicionarCompetitor($event)"
        :clienteid="pesquisa.cliente_id"
        :item="competitor"
        :label="'nome'"
        :label2="'brand'"
        :label3="'price'"
        :key="competitor.id"
        :product_or_competitor="'competitor'"
      />
    </div>
    <div style="position: relative">
      <div class="SaveCancel">
        <ActionRouter
          @click="finalizar()"
          :color="'primary'"
          :label="'Salvar'"
          :route="{
            name: 'pesquisa',
            params: { pesquisaid: $route.params.pesquisaid },
          }"
          :disabled="isPesquisaConcluida"
        />
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
import headerEmpresa from "../../components/headerEmpresa.vue";
import researchField from "../../components/researchField.vue";
import ActionRouterBack from "../../components/ActionRouterBack.vue";
import ActionRouter from "../../components/ActionRouter.vue";
export default {
  name: "FormPesquisaCompetitors",
  props: {
    values: Object,
    submitLabel: String,
    onSave: Function,
  },
  data() {
    return {
      id: this?.$route?.params?.pesquisaid,
      pesquisa: {},
      competitors: [],
      formValues: [],
    };
  },
  components: {
    headerEmpresa,
    researchField,
    ActionRouterBack,
    ActionRouter,
  },

  methods: {
    async fetchPesquisa() {
      let response = axios.get("/pesquisas/" + this.id);
      this.pesquisa = (await response).data;
      console.log("Dados da pesquisa:", this.pesquisa);
    },
    async fetchCompetitors() {
  try {
    // Primeiro fetch para obter os competitors
    let response = await axios.get("/all/competitors");
    this.competitors = response.data;
    console.log(this.competitors);

    // Segundo fetch para obter os preços dos competitors relacionados ao cliente
    let response1 = await axios.get(
      "competitor_survey/cliente_competitors/" + this.pesquisa.cliente_id
    );
    const auxiliar = response1.data;
    console.log("Testando:" + auxiliar);

      this.competitors = this.competitors.map((competitor) => {
        const competitorAuxiliar = auxiliar.find(
          (item) => item.competitor_id === competitor.id
        );
        return {
          ...competitor,
          price: competitorAuxiliar ? competitorAuxiliar.price : null,
        };
      });
  
  } catch (error) {
    console.error(error);
  }
},

    adicionarCompetitor(index) {
      if (this.formValues) {
        const existingIndex = this.formValues.findIndex(
          (item) => item.competitor_id === index.competitor_id
        );
        if (existingIndex !== -1) {
          // Editar o item existente
          this.formValues[existingIndex] = index;
        } else {
          // Adicionar um novo item
          this.formValues.push(index);
        }
      } else {
        // Caso o array esteja vazio, criar um novo array com o item
        this.formValues = [index];
      }
    },

    excluirModelValue(modelValue) {
      const index = this.formValues.indexOf(modelValue);
      if (index !== -1) {
        this.formValues.splice(index, 1);
      }
    },

    finalizar() {
      this.onSave(this.formValues);
    },
  },

  computed: {
    isPesquisaConcluida() {
      return this.pesquisa.status == "CONCLUIDO";
    },
  },

  mounted() {
    this.fetchPesquisa();
    this.fetchCompetitors();
  },
};
</script>
<style scoped>
.FormCompetitor {
  padding-bottom: 14vh;
  background-color: rgb(246, 246, 246);
  bottom: 8vh;
  width: 100%;
  height: auto;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
  justify-content: center;
}

.add-but {
  height: 5vh;
  text-align: right;
  display: flex;
  flex-direction: row-reverse;
  justify-content: space-between;
}

.name {
  text-align: left;
  color: #a0a0a0;
  font-size: 2vh;
  margin-left: 2vh;
  margin-top: 2.5vh;
}



.SaveCancel{
  border-top: 0.2vh solid rgb(170, 170, 170);
  border:#2c9aff, ;
  background-color: rgb(238, 238, 238);
  width: 100%;
  position: fixed;
  display: flex;
  justify-content: center;
  align-items: center;
  bottom: 8vh;
  height: 12vh;
  flex-wrap: wrap;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}

.SaveCancel a {
  color: #2c9aff;
  text-align: center;
  justify-content: space-evenly;
  align-items: center;
  font-weight: bold;
  font-size: 3vh;
}
</style>
