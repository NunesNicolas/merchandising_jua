<script setup>
import axios from "axios";
</script>

<template>

  <div class="page">

    <div class="d-flex" style="width: 100%; height: 5vh; justify-content:end; padding:10px">
      <p class="mr-auto" style="color:#858585; font-weight: bold; font-size: 2.2vh;"> Produto </p>
      <p class="" style="color:#858585; font-weight: bold; font-size: 2.2vh;"> Dashboard / Produtos / Produto </p>
    </div>

    <div class="d-flex" style="width: 100%; height: 4vh; justify-content:end; padding:35px">
      <a @click="$router.go(-1)" type="button" class="btn btn-light align-self-center" style="
    border-radius: 20px;
    border:solid #858585 0.2vh;
    color:#858585;
    font-weight: bold;
    font-size:13px;
    height: 30px;
    width: 70px;
    ">
        <p class="mt-1" style="margin-top: 2px">VOLTAR</p>
      </a>
    </div>

    <div :class="bodyAll" id="bodyallId">
      <div style="width: 100%;">

        <!-- bloco superior de informações -->
        <div :class="topDiv" id="conDiv">

          <!-- icones canto superior direito -->
          <div style="width: 100%; height: 5vh; justify-content: end; display: flex; padding: 0.5vh;">
            <a class="miniBt" style="color: red; margin-right: 0.5vw;">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                <path
                  d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2" />
              </svg>
            </a>
            <!-- <b-button v-b-modal.modal-produto> -->
            <a v-b-modal.modal-produto class="miniBt" style="color: #2C9AFF;">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path
                  d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                <path fill-rule="evenodd"
                  d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
              </svg>
            </a>
            <!-- </b-button> -->
          </div>
          <!-- FIM: icones canto superior direito -->

          <div class="d-flex" style="width: 100%">
            <!-- infos produto -->
            <img :src=produto.img style="width: 15vw; height: 29vh;">
            <div
              style="display: flex; width: 68vw; height: 30vh; flex-wrap: wrap; align-items: center; justify-content: space-between; padding: 1vh;">
              <label style="width: 40%; text-align: start; color:#858585; font-weight: bold;">Nome do produto:</label>
              <p class="inputFachada" style="width: 100%;">{{ produto.nome }}</p>
              <label style="width: 40%; text-align: start; color:#858585; font-weight: bold;"> Preço médio: </label>
              <label style="width: 48%; text-align: start; color:#858585; font-weight: bold;">Quantidade do concorrente:
              </label>
              <p class="inputFachada" style="width: 45%;"></p>
              <p class="inputFachada" style="width: 48%;"> {{ competitors.length }} </p>
            </div>
            <!-- FIM: infos produto -->
          </div>

          <div class="divFooter" style="width: 100%">
            <div class="btnPeso">

              <router-link :to="{ name: 'InfoProdutos', params: { id: button500 } }">
                <a type="button" class="peso" :class="{ 'botao-ativo': paginaAtual == '500' }" name="500" ac value=""
                  style="border-bottom: solid;border-radius: 0vh 0vh 0vh 1vh;" href="">500g</a>
              </router-link>

              <router-link :to="{ name: 'InfoProdutos', params: { id: button1000 } }">
                <a type="button" class="peso" :class="{ 'botao-ativo': paginaAtual == '1000' }" name="1000"
                  style="border-bottom: solid" value="" href="">1kg</a>
              </router-link>

              <router-link :to="{ name: 'InfoProdutos', params: { id: button5000 } }">
                <a type="button" class="peso" :class="{ 'botao-ativo': paginaAtual == '5000' }" name="5000"
                  style="border-bottom: solid" value="" href="">5kg</a>
              </router-link>


            </div>

            <div class="btnPeso2 mb-3"
              style="display:flex; flex-wrap: wrap; justify-content: end; align-items: center; padding-right: 1vw">
              <button class="addButton">
                <svg xmlns="http://www.w3.org/2000/svg" width="95%" height="95%" fill=" " class="bi bi-plus-lg"
                  viewBox="0 0 16 16">
                  <path fill-rule="evenodd"
                    d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                </svg>
              </button>


            </div>
          </div>

          <!--FIM: bloco superior de informações -->
        </div>

        <div id="contentCompetitors" v-if="temCompetitors">
          <router-link :to="{ name: 'createCompetitors', params: { id: this.id } }">
            <div class="d-flex flex-wrap" style="width:100%; align-items:start; padding:1%">
              <a href="" class="btn btn-primary"
                style="color:#ffffff; font-weight: bold; border-radius:15px; align-items:left; padding: 0.5vh 1vw; ">ADICIONAR
                CONCORRENTE
              </a>
            </div>
          </router-link>
          <competitorsComponents @modificarEstilo="modificarEstilo" :competitors="competitors" />
        </div>
        <div v-else="temCompetitors">
          <router-link :to="{ name: 'createCompetitors', params: { id: this.id } }">
            <div style="width:100%; text-align:justify; align-items:start; padding:1%">
              <a href="" class="btn btn-primary"
                style="color:#ffffff; width: 20%; height:33px; font-weight: bold; border-radius:15px; align-items:left">
                <p class="mt-1">ADICIONAR CONCORRENTE</p>
              </a>
            </div>
          </router-link>
          <h2 style="font-weight:bold; text-align:justify; color:#808080; font-size:20px;"> SEM PRODUTOS CONCORRENTES
            CADASTRADOS</h2>
        </div>
      </div>

      <editarProdutoModal :produto="produto" />

    </div>
  </div>



</template>

<script>
import competitorsComponents from '../../components/produtos/competitorsComponents.vue';
import editarProdutoModal from '../../components/produtos/modals/editarProdutoModal.vue';

// const showModal = ref(false);

// const abrirModal = () => {
//   showModal.value = true;
// };

export default {

  data() {
    return {
      id: this.$route.params.id,
      produto: [],
      competitors: [],
      variants: [],
      temCompetitors: false,
      paginaAtual: 500,
      button500: 0,
      button1000: 0,
      button5000: 0,
      bodyAll: 'bodyBase',
      topDiv: 'topBase'
    };
  },

  methods: {

    // abrirModal(){
    //     this.$root.$emit('open-modal-produto');
    //     // this.$refs['modal-edit'].show()
    //   },

    async getProdutos() {
      let response = axios.get('http://127.0.0.1:8000/api/produtos/' + this.id);
      this.competitors = (await response).data.competitorsthis;
      this.variants = (await response).data.produtovariants;
      this.produto = (await response).data.produto;
      this.paginaAtual = this.produto.weight


      if (this.competitors[0] != null) {
        this.temCompetitors = true;
      }

      for (let i = 0; i < this.variants.length; i++) {

        if (this.variants[i].weight == 500) {
          this.button500 = this.variants[i].id;
        }
        if (this.variants[i].weight == 1000) {
          this.button1000 = this.variants[i].id;

        }
        if (this.variants[i].weight == 5000) {
          this.button5000 = this.variants[i].id;

        }
      }
      if (this.button500 == 0) {
        this.button500 = this.produto.id;

      }
      if (this.button1000 == 0) {
        this.button1000 = this.produto.id;

      }
      if (this.button5000 == 0) {
        this.button5000 = this.produto.id;

      }

    },

    modificarEstilo() {
      if (this.bodyAll == 'bodyBase') {
        this.bodyAll = 'bodyMod';
        this.topDiv = 'topMod';
      } else {
        this.bodyAll = 'bodyBase';
        this.topDiv = 'topBase';
      }

    }

  },


  components: {
    competitorsComponents,
    editarProdutoModal
  },

  mounted() {
    this.getProdutos();
  }


}
</script>


<style scoped>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.inputFachada {
  height: 7vh;
  border: none solid #662222;
  background-color: #e7e7e7;
  color: #808080;
  border-radius: 1vh;
  padding: 1vh;
  text-align: justify;

}

label {
  color: #858585;
  font-size: 2vh;
  height: 3vh;
  width: 32vw;
  padding: 1vh;
}

.bodyBase {
  margin: 0;
  margin-left: 3.5vw;
}

.bodyMod {
  margin: 0;
  margin-left: 3.5vw;
  width: 60%;
}


.topBase {
  display: flex;
  border: 0.2vh solid #d3d6db;
  width: 93%;
  height: 50vh;
  border-radius: 1vh;
  background-color: #ffffff;
  flex-wrap: wrap;
  justify-content: space-evenly;
}

.topMod {
  display: flex;
  border: 0.2vh solid #d3d6db;
  width: 93%;
  height: 50vh;
  border-radius: 1vh;
  background-color: #ffffff;
  flex-wrap: wrap;
  justify-content: space-evenly;
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
}

.dark-background {
  width: 100%;
  height: 0vh;
  position: fixed;
  background-color: rgb(0, 0, 0, 0.5);
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  z-index: 1;
  overflow: hidden;
  transition: 0.5s ease-in;
}

.modalEditar {
  width: 30vw;
  height: 0vh;
  background-color: #ffffff;
  position: fixed;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-evenly;
  overflow: hidden;
  margin-bottom: 10vh;
  border-radius: 1vh;
  transition: 0.5s ease-in;
}

.modalEditar input,
select,
option {
  width: 27vw;
  height: 6vh;
  font-size: 2.2vh;
}

.modalEditar div {
  display: flex;
  flex-wrap: wrap;
  justify-content: end;
  align-items: center;
  padding: 0vw 0.5vw;
  width: 30vw;
  height: 8vh;
  background-color: transparent;
}

.tituloModal {
  text-align: start;
  width: 25vw;
  font-size: 2.2vh;
}

.closeButton {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  width: 3vw;
  background-color: transparent;
  padding: 1vh 0.1vw;
}

.closeButton:hover {
  color: red;
}

.cancelar,
.salvar {
  padding: 0.2vh 1vw;
  border: 0.1vh solid #858585;
  border-radius: 0.4vh;
}

.cancelar {
  margin-right: 1vw;
  background-color: transparent;
}

.cancelar:hover {
  background-color: #d3d6db;
}

.salvar {
  background-color: #2C9AFF;
  color: #ffffff;
}

.salvar:hover {
  background-color: #2483dd;
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

.botao-ativo {
  color: #2C9AFF;
}

.peso:hover {
  border-bottom: solid #2C9AFF;
}

.addButton {
  width: 2.5vw;
  height: 5vh;
  background-color: transparent;
  border-radius: 0.5vh;
  border: 0.1vh solid #858585;
  color: #858585;
}

.addButton:hover {
  color: #2C9AFF;
  border: 0.1vh solid #2C9AFF;

}

a:visited {
  color: none;
}

.miniBt {
  cursor: pointer;
}
</style>