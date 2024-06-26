<script setup>
import axios from "axios";
</script>

<template>

  <div class="d-flex" style="width: 100%; height: 5vh; justify-content:space-between; padding:10px">
    <p class="ml-4 mr-auto" style="color:#858585; font-weight: bold; font-size: 2.2vh;"> Promotores </p>
    <p class="mr-3" style="color:#858585; font-weight: bold; font-size: 2.2vh;"> Dashboard / Promotores </p>
  </div>

  <router-link to="/promotores">
    <div class="d-flex" style="width: 100%; height: 4vh; justify-content:end; padding:35px">
      <a href="" type="button" class="btn btn-light align-self-center" style="
      border-radius: 20px;
      border:solid #858585 0.2vh;
      color:#858585;
      font-weight: bold;
      font-size:13px
      "> VOLTAR </a>
    </div>
  </router-link>

  <section style="
      display: flex;
      flex-wrap: wrap;
      width: 100%;
      justify-content: space-evenly;
      padding-top: 1vh;
      color:#858585; 
      font-weight: bold;
  ">
    <div class="card" style="width: 20rem; display: flex; border-radius:20px; height: 85vh;">
      <div class="card-body" style="width: 20rem; display: flex; justify-content: center;">
        <svg width="200" height="200">
          <clipPath id="clipCircle">
            <circle cx="100" cy="100" r="70" />
          </clipPath>
          <circle cx="100" cy="100" r="70" width="200" height="200" fill="none" stroke="grey" stroke-width="3" />
          <image xlink:href="https://www.pngall.com/wp-content/uploads/5/Profile-PNG-Pic.png" width="200" height="200"
            clip-path="url(#clipCircle)" />
        </svg>
      </div>

      <ul class="list-group list-group-flush" style="border-radius:20px; text-align: justify;">
        <li class="list-group-item" style="background: none;border: none">Nome do Promotor:</li>
        <li class="list-group-item" style="background: none;border: none; margin-top:-20px; color:#9FA4ADFF">
          {{ promotor.nome }} </li>
        <li class="list-group-item" style="background: none;border: none">Email do Promotor:</li>
        <li class="list-group-item" style="background: none;border: none; margin-top:-20px; color:#9FA4ADFF">
          {{ promotor.email }} </li>
        <li class="list-group-item" style="background: none;border: none; border-radius:20px">Status do Promotor:</li>
        <li class="list-group-item"
          style="background: none;border: none; border-radius:20px; margin-top:-20px; color:#9FA4ADFF">
          <p style="color:red">A DEFINIR</p>
        </li>
      </ul>

    </div>

    <div class="d-flex" style="
      width: 41vw; 
      height: 50vh; 
      justify-content: space-evenly;
      flex-wrap: wrap;
      padding-top: 2vh;
    ">
      <div class="bg-white d-flex"
        style=" justify-content: space-evenly; flex-wrap: wrap; width: 20vw; height:20vh; border-radius: 1vh; padding: 1vh; box-shadow: 0vh 0vh 0.1vh 0.1vh #c0c0c0;">
        <h6 style=" width: 15vw; height: 9vh;">Tempo médio de atendimento:</h6>
        <img
          src="https://cdn.discordapp.com/attachments/1145841372402819143/1229234582977515530/image.png?ex=662ef0ea&is=661c7bea&hm=cbba8302d8813fb5400af32d50008f33a783042805293df5727532541708fda6&"
          style="width: 4vw; height: 8vh;">
        <div style="height: 6vh; width: 20vw;"></div>
        <p style="font-size: 1.5vh; width: 20vw; height:3vh;">Tempo medio de atendimento 14/04/2024</p>
      </div>
      <div class="bg-white d-flex"
        style=" justify-content: space-evenly; flex-wrap: wrap; width: 20vw; height:20vh; border-radius: 1vh; padding: 1vh; box-shadow: 0vh 0vh 0.1vh 0.1vh #c0c0c0;">
        <h6 style=" width: 15vw; height: 9vh;">Quantidades de atendimentos no mês:</h6>
        <img
          src="https://cdn.discordapp.com/attachments/1145841372402819143/1229234815551934635/image.png?ex=662ef122&is=661c7c22&hm=04b32a8707e33c5a32cdef66ab9d12d100e785b90b523bb46d21a160a39b3159&"
          style="width: 4vw; height: 8vh;">
        <div style="height: 6vh; width: 20vw;"></div>
        <p style="font-size: 1.5vh; width: 20vw; height:3vh;">Tempo medio de atendimento 14/04/2024</p>
      </div>
      <div class="bg-white d-flex"
        style=" justify-content: space-evenly; flex-wrap: wrap; width: 20vw; height:20vh; border-radius: 1vh; padding: 1vh; box-shadow: 0vh 0vh 0.1vh 0.1vh #c0c0c0;">
        <h6 style=" width: 15vw; height: 9vh;">Pesquisas feitas:</h6>
        <img
          src="https://cdn.discordapp.com/attachments/1145841372402819143/1229234734639353867/image.png?ex=662ef10e&is=661c7c0e&hm=9d4ccb18d89e5895a2b98f2e54a68942ea38d497bc4cfef505e17dbc197f28a5&"
          style="width: 4vw; height: 8vh;">
        <div style="height: 6vh; width: 20vw;"></div>
        <p style="font-size: 1.5vh; width: 20vw; height:3vh;">Tempo medio de atendimento 14/04/2024</p>
      </div>
      <div class="bg-white d-flex"
        style=" justify-content: space-evenly; flex-wrap: wrap; width: 20vw; height:20vh; border-radius: 1vh; padding: 1vh; box-shadow: 0vh 0vh 0.1vh 0.1vh #c0c0c0;">

      </div>
    </div>
    <div class="d-flex bg-white " style="
        flex-wrap: wrap;
        width: 25vw;
        height: 50vh;
        border-radius: 2vh;
        padding: 1vh;
        box-shadow: 0vh 0vh 0.1vh 0.1vh #c0c0c0;
    ">
      <p>Atendimento dos ultimos 30 dias</p>
      <div class="d-flex" style="
          width: 23vw;
          height: 50vh;
          padding: 10vw;
      ">
        <p>Grafico</p>
      </div>
      <div class="ml-auto">
        <router-link :to="{ name: 'createEmpresas', params: { id: this.id } }">
          <button type="button" class="btn btn-primary"
            style="border: none;border-radius: 20px; background:#2C9AFF">Adicionar Cliente</button>
        </router-link>
      </div>
    </div>

    <div class="d-flex" style="
          width:100%; 
          height:58vh;
          padding:2%;
          justify-content: space-evenly;
          flex-wrap: wrap;
          color:#858585; 
          font-weight: bold;
          
          ">

      <div
        style="width: 90vh; height:50vh; background:#ffffff; border-radius:10px; margin-right: 30px; border:darkgray solid 1px; text-align: left;">
        <ul class="list" style="list-style-type:none; padding:5px;">
          <li class="list-item">
            <p class="ml-3">VISITAS DO PROMOTOR</p>
          </li>
          <div class="container">
            <div class="row">
              <div class="col-sm">
                CLIENTES
                <p style="font-size:11px; font-weight:normal ;">Cariri Center Supermercado</p>
              </div>
              <div class="col-sm">
                CHECK-IN
                <p style="font-size:11px; font-weight:normal ;">06/12/2022 ás 16:20</p>
              </div>
              <div class="col-sm">
                CHECK-OUT
                <p style="font-size:11px; font-weight:normal ;">06/12/2022 ás 17:20</p>
              </div>
            </div>
          </div>
        </ul>
      </div>


      <div class="container"
        style="width: 90vh; height:50vh; background:#ffffff; border-radius:10px; border:darkgray solid 1.2px; text-align:left;">
        <ul class="list" style="list-style-type:none; padding:5px">
          <li class="list-item d-flex" style="justify-content: space-between">
            <p style="text-align:initial"> ROTEIRO DO PROMOTOR </p> <a class="mt-1" style=""> <svg
                xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#2C9AFF" class="bi bi-pencil-square"
                viewBox="0 0 16 16">
                <path
                  d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                <path fill-rule="evenodd"
                  d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
              </svg> </a>
          </li>
          <div class="container">
            <div class="row">
              <div class="col-sm">
                CNPJ
                <p style="font-size:11px; font-weight:normal ;">30.058.107/0001-51</p>
              </div>
              <div class="col-sm">
                CLIENTE
                <p style="font-size:11px; font-weight:normal ;">Cariri Center Supermercados</p>
              </div>
              <div class="col-sm">
                ÚLTIMA VISITA <a class="" style="align-content: end"> <svg xmlns="http://www.w3.org/2000/svg" width="16"
                    height="16" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                    <path
                      d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5" />
                    <path
                      d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                  </svg> </a>
                <p style="font-size:11px; font-weight:normal ;">06/12/2022 ás 16:20</p>
              </div>
            </div>
          </div>
        </ul>

        <!-- <div id="contentCard">
              <cardsComponents :promotores="promotores"/>
            </div> -->

      </div>

    </div>

  </section>


</template>

<script>

export default {
  data() {
    return {
      id: this.$route.params.id,
      promotor: ''
    };
  },

  methods: {
    async getPromotores() {
      let response = axios.get('/promotores/' + this.id);
      this.promotor = (await response).data.promotor;
    },
  },

  mounted() {
    this.getPromotores();
  }

}

</script>


<style scoped></style>