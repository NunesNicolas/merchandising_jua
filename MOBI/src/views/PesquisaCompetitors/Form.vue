<template>
  <div class="FormCompetitor">
    <headerEmpresa :visita="pesquisa" />
    <div class="add-but">
      <ActionRouter :route="{ name: 'pesquisa', params: { pesquisaid: id } }">
        <slot><i class="bi bi-arrow-left-square icon-right" title="Voltar"
            style="font-size: 25px; background-color: transparent"></i></slot>
      </ActionRouter>
      <h5 class="name">Pesquisa Concorrentes</h5>
    </div>

    <select v-model="selectedProduto" style="margin-top: 4vh;">
      <option :value="null">Selecione um Produto</option>
      <option v-for="produto in produtos" :key="produto.id" :value="produto.id" :class="produto.preenchido">
        {{ produto.nome }} {{ produto.weight }}
      </option>
    </select>
    <div v-for="competitor in competitors">
      <researchField v-if="competitor.product_id == selectedProduto" @preencher="adicionarCompetitor($event, competitor)"
        :clienteid="pesquisa.cliente_id" :item="competitor" :label="'nome'" :label2="'brand'" :label3="'price'"
        :key="competitor.id" :product_or_competitor="'competitor'" v-model="researchFields[competitor.id]" />
    </div>
    <div style="position: relative">
      <div class="SaveCancel">
        <ActionRouter @click="finalizar()" :color="'primary'" :label="'Salvar'" :route="{
          name: 'pesquisa',
          params: { pesquisaid: $route.params.pesquisaid },
        }" :disabled="isPesquisaConcluida" />
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
    produtos: Array,
  },
  data() {
    return {
      id: this?.$route?.params?.pesquisaid,
      pesquisa: {},
      competitors: [],
      selectedProduto: null,
      researchField: {},
      formValues: [],
      researchFields: {},
    };
  },
  components: {
    headerEmpresa,
    researchField,
    ActionRouterBack,
    ActionRouter,
  },

  methods: {
    competitorPreenchido(produto) {
     produto.preenchido = 'selected';
    },

    async fetchPesquisa() {
      let response = axios.get("/pesquisas/" + this.id);
      this.pesquisa = (await response).data;
      console.log("Dados da pesquisa:", this.pesquisa);
    },

    async getPriceCompetitors() {
            try {
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

    adicionarCompetitor(index, item) {

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
          this.researchFields[index.competitor_id] = index.researchField
          const self = this;
          this.produtos.forEach(tempProduto => {
            if (tempProduto.id == item.product_id) {
              self.competitorPreenchido(tempProduto);
            }
          });


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

  watch: {
    selectedProduto(newValue) {
      this.competitors.forEach(competitor => {
        if (competitor.product_id === newValue) {
          this.researchFields[competitor.id] = competitor.researchField
        }
      })
    }
  },

  computed: {

    isPesquisaConcluida() {
      return this.pesquisa.status == "CONCLUIDO";
    },
  },

  mounted() {
    this.fetchPesquisa();
    this.getPriceCompetitors();

  },
};
</script>
<style scoped>
select {
  background-color: white;
  border-radius: 10px;
  box-shadow: 0vh 0.1vh 0.1vh 0vh;
  font-size: 2vh;
  margin-top: 2vh;
  color: #8d8d8d;
}

.selected {
  color: green;
  font-weight: bold;
}

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



.SaveCancel {
  border-top: 0.2vh solid rgb(170, 170, 170);
  border: #2c9aff, ;
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
