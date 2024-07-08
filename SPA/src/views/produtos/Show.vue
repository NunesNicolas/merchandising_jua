<template>
<div>
  <Breadcrumb pageTitle="Produtos" routeInfo="Dashboard / Produtos" />

  <ActionListWrapper>
    <ActionRouterBack />
  </ActionListWrapper>

  <div class="page" id="BodyAll" ref="BodyAll">

    <BoxInfoWrapper>
      <slot>
        <div class="d-flex">
          <div class="box-line">
            <img :src="produto.img" height="150px" width="auto" />
          </div>
          <div style="width: 100%">
            <div class="box-line">
              <BoxInfo title="Nome" :value="produto.nome"></BoxInfo>
            </div>
            <div class="d-flex" style="width: 100%; gap: 10px; justify-content: space-between">
              <div class="box-line" style="width: 50%">
                <BoxInfo title="Preço médio:"></BoxInfo>
              </div>
              <div class="box-line" style="width: 50%">
                <BoxInfo title="Quantidade de concorrentes:" :value="competitors.length"></BoxInfo>
              </div>
            </div>
          </div>
          <DeleteBT :item="produto" :label="'nome'" :url="'/produtos/'" />
          <router-link :to="{
            name: 'UpdateProdutos',
            params: { id: this.$route.params.id },
          }">
            <i class="bi bi-pencil-square ml-2" style="font-size: 17px; color: dodgerblue"></i>
          </router-link>
        </div>

        <div class="divFooter" style="width: 100%">
          <FooterButtons :id="id" :label="'weight'" :instance="produto" :items="variants" :defaults="[
            { weight: '200g' },
            { weight: '500g' },
            { weight: '1kg' },
            { weight: '5kg' },
            { weight: '500ml' },
            { weight: '1l' },
            { weight: '2l' },
            { weight: '5l' },
          ]" />

          <b-button v-b-modal.modal-1 class="" style="padding: 5px; background-color: white; margin: 2px">
            <i class="bi bi-plus-circle" style="font-size: 30px; color: black"></i>
          </b-button>
          <b-modal id="modal-1" title="BootstrapVue">
            <p class="my-4">Hello from modal!</p>
          </b-modal>
        </div>
      </slot>
    </BoxInfoWrapper>

    <div class="btCompetitorAdd">
      <router-link :to="{
        name: 'CreateCompetitors',
        params: { id: this.$route.params.id },
      }">
        <h5 style="color: white; text-align: center">Adicionar Concorrente</h5>
      </router-link>
    </div>

    <CardList :items="competitors" :fields="{
      nome: 'PRODUTOS',
      brand: 'CONCORRENTES',
    }">
      <template v-slot:actions="{ item }">
        <router-link :to="{
          name: 'UpdateCompetitors',
          params: {
            id: this.$route.params.id,
            compid: item.id,
          },
        }" class="d-flex flex-wrap">
          <i class="bi bi-pencil-square" style="font-size: 2rem; color: grey"></i>
        </router-link>

        <button @click="toggleModal(item.id)" class="buttonComp">
          <i class="bi bi-file-earmark-text" style="font-size: 2rem; color: grey"></i>
        </button>

        <DetalhesModal @modificarEstilo="modificarEstilo" @toggleModal="toggleModal()" v-show="modalEdit == item.id"
          :title="'DETALHES PRODUTO CONCORRENTE'" :value="modalEdit" :item="item" :fields="{
            nome: 'Nome',
            brand: 'Marca',
          }">
          <slot>
            <div>
              <h5 class="subtitle">Preço nos nossos clientes</h5>
              <div class="linha-horizontal"></div>
            </div>
            <div class="divtable">
              <table>
                <thead>
                  <tr>
                    <th>CLIENTES</th>
                    <th>JUÁ</th>
                    <th>MARCA</th>
                  </tr>
                  <td>PEDRO LUCAS MOREIRA</td>
                  <td>R$ 15,00</td>
                  <td>R$ 15,99</td>
                </thead>
              </table>
            </div>
          </slot>
        </DetalhesModal>
      </template>
    </CardList>
  </div>
</div>
</template>

<script>
import axios from "axios";
import ActionListWrapper from "../../components/ActionListWrapper.vue";
import ActionRouterBack from "../../components/ActionRouterBack.vue";
import ActionRouter from "../../components/ActionRouter.vue";
import BoxInfoWrapper from "../../components/Box/BoxInfoWrapper.vue";
import BoxInfo from "../../components/Box/BoxInfo.vue";
import Breadcrumb from "../../components/Breadcrumb.vue";
import CardList from "../../components/CardList.vue";
import competitorsComponents from "../../components/produtos/competitorsComponents.vue";
import DetalhesModal from "../../components/modals/DetalhesModal.vue";
import FooterButtons from "../../components/FooterButtons.vue";
import DeleteBT from "../../components/delete.vue";

export default {
  data() {
    return {
      id: this.$route.params.id,
      produto: "",
      competitors: [],
      variants: [],
      weights: [],
      temCompetitors: false,
      modalEdit: "",
      BodyAll: "page",
    };
  },

  methods: {
    async getProdutos() {
      let response = axios.get("/produtos/" + this.id);
      this.competitors = (await response).data.competitorsthis;
      this.variants = (await response).data.produtovariants;
      this.produto = (await response).data.produto;
      this.paginaAtual = this.produto.weight;

      if (this.competitors[0] != null) {
        this.temCompetitors = true;
      }
    },

    modificarEstilo() {
      this.$refs.BodyAll.classList.toggle("pageMod");
    },

    toggleModal(id) {
      const bodyAllElement = this.$refs.BodyAll;
      if (this.modalEdit == id) {
        this.modalEdit = null;
        this.modificarEstilo();
      } else if (
        this.modalEdit != id &&
        !bodyAllElement.classList.contains("pageMod")
      ) {
        this.modalEdit = id;
        this.modificarEstilo();
      } else {
        this.modalEdit = id;
      }
    },
  },

  components: {
    ActionListWrapper,
    ActionRouterBack,
    ActionRouter,
    BoxInfoWrapper,
    BoxInfo,
    Breadcrumb,
    competitorsComponents,
    CardList,
    DetalhesModal,
    FooterButtons,
    DeleteBT,
  },

  mounted() {
    this.getProdutos();
  },
};
</script>

<style scoped>
.divtable {
  text-align: justify;
  width: 100%;
}

table {
  width: 100%;
}

.linha-horizontal {
  height: 0px;
  width: 100%;
}

.subtitle {
  margin-bottom: -15px;
  text-align: justify;
  font-size: 15px;
}

.pageMod {
  width: 62%;
}

.bi.bi-file-earmark-text{
  display: flex;
}

.buttonComp {
  display: flex;
  flex: wrap;
  background-color: #f8f9fa;
  height: 100%;
  text-align: center;
  outline: none;
}

.btCompetitorAdd {
  text-align: left;
  margin-top: 25px;
  margin-left: 15px;
  border-radius: 10px;
  background-color: #2c9aff;
  width: 17%;
  height: 50%;
}

.bi.bi-pencil-square {
  color: #2c9aff;
}

.btnPeso {
  width: 30vw;
  height: 11vh;
  border: none;
  text-align: left;
}

.peso {
  width: 5vw;
  height: 7vh;
  text-align: center;
  margin-top: 3.8vh;
  background-color: transparent;
  border: none;
  color: #858585;
  border-bottom: 0.1vh solid;
  text-decoration: none;
}

.divFooter {
  width: 100%;
  margin-top: 6vh;
  height: 9vh;
  display: flex;
  flex-wrap: nowrap;
  justify-content: space-between;
  align-items: end;
  border-top: 0.2vh solid #d3d6db;
  margin-bottom: -25px;
  margin-left: -25px;
}

.botao-ativo {
  color: #2c9aff;
}

.peso:hover {
  color: solid #2c9aff;
  border-bottom: solid #2c9aff;
}
</style>
