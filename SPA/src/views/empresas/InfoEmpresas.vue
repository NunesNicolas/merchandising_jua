<script setup>
import axios from "axios";
import { RouterLink } from "vue-router";
</script>

<template>

  <div class="d-flex" style="width: 100%; justify-content:space-between; padding:10px">
    <p class="ml-4 mr-auto" style="color:#858585; font-weight: bold; font-size: 2.2vh;"> Clientes </p>
    <p class="mr-3" style="color:#858585; font-weight: bold; font-size: 2.2vh;"> Dashboard / Clientes </p>
  </div>

  <div class="d-flex" style="width: 100%; height: 4vh; justify-content: end; padding:35px">
    <a @click="$router.go(-1)" type="button" class="btn btn-light align-self-center" style="
        border-radius: 20px;
        border:solid #858585 0.2vh;
        color:#858585;
        font-weight: bold;
        font-size:13px
        "> VOLTAR
    </a>
  </div>

  <!-- BOX 1 -->
  <div class="bg-white ml-3 mr-3"
    style="width: 91vw; margin-top:-1vh; height:45vh; border-radius: 1vh; padding: 1vh; box-shadow: 0vh 0vh 0.1vh 0.1vh #c0c0c0;">

    <!-- BX1: LINHA 1 -->
    <div class="d-flex up" style="height: 10%">
      <li class="list-group-item ml-0 mr-2"
        style="width: 50%; height:0px; background:none; border: none; border-radius: 10px">
        <p style="font-size:15px;color:#858585;font-weight: bold;">Nome cliente</p>
      </li>
      <li class="list-group-item ml-0 mr-3" style="width: 50%; background: none; border: none; border-radius: 10px">
        <p style="font-size:15px;color:#858585;font-weight: bold; margin-top:-10px">CNPJ</p>
      </li>
    </div>

    <div class="d-flex" style="height: 12%">
      <li class="list-group-item ml-3 mr-2"
        style="width: 50%; background-color:#e7e7e7; border: none; border-radius: 10px">
        <p style="font-size:15px;color:#8d8d8d; margin-top:-6px">Cariri Center</p>
      </li>
      <li class="list-group-item ml-2 mr-3"
        style="width: 50%; background-color:#e7e7e7; border: none; border-radius: 10px">
        <p style="font-size:15px;color:#8d8d8d; margin-top:-6px">300102001</p>
      </li>
    </div>
    <br>

    <!-- BX1: LINHA 2 -->
    <div class="d-flex up" style="height: 10%">
      <li class="list-group-item ml-0 mr-2" style="width: 100%; background: none; border: none; border-radius: 10px">
        <p style="font-size:15px; color:#858585;font-weight: bold; margin-top:-10px">Endereço do cliente</p>
      </li>
    </div>

    <div class="d-flex" style="height: 12%; display:flex">
      <li class="list-group-item ml-3 mr-3"
        style="width: 100%; background-color:#e7e7e7; border: none; border-radius: 10px;">
        <p style="font-size:15px;color:#8d8d8d; margin-top:-6px;">Endereço</p>
      </li>
    </div>
    <br>

    <!-- BX1: LINHA 3 -->
    <div class="d-flex up" style="height: 10%">
      <li class="list-group-item ml-0 mr-2" style="width: 25%; background: none; border: none; border-radius: 10px">
        <p style="font-size:15px; color:#858585;font-weight: bold; margin-top:-10px">Última visita</p>
      </li>
      <li class="list-group-item ml-0 mr-2" style="width: 25%; background: none; border: none; border-radius: 10px">
        <p style="font-size:15px; color:#858585;font-weight: bold; margin-top:-10px">Última pesquisa</p>
      </li>
      <li class="list-group-item ml-0 mr-2" style="width: 25%; background: none; border: none; border-radius: 10px">
        <p style="font-size:15px; color:#858585;font-weight: bold; margin-top:-10px">Nome promotor</p>
      </li>
      <li class="list-group-item ml-0 mr-2" style="width: 25%; background: none; border: none; border-radius: 10px">
        <p style="font-size:15px; color:#858585;font-weight: bold; margin-top:-10px">Tempo do último atendimento</p>
      </li>
    </div>

    <div class="d-flex" style="height: 12%">
      <li class="list-group-item ml-3 mr-3"
        style="width: 25%; background-color:#e7e7e7; border: none; border-radius: 10px">
        <p style="font-size:15px;color:#8d8d8d; margin-top:-6px">Data</p>
      </li>
      <li class="list-group-item ml-3 mr-3"
        style="width: 25%; background-color:#e7e7e7; border: none; border-radius: 10px">
        <p style="font-size:15px;color:#8d8d8d; margin-top:-6px">Data</p>
      </li>
      <li class="list-group-item ml-3 mr-3"
        style="width: 25%; background-color:#e7e7e7; border: none; border-radius: 10px">
        <p style="font-size:15px;color:#8d8d8d; margin-top:-6px">Promotor</p>
      </li>
      <li class="list-group-item ml-3 mr-3"
        style="width: 25%; background-color:#e7e7e7; border: none; border-radius: 10px">
        <p style="font-size:15px;color:#8d8d8d; margin-top:-6px">Tempo</p>
      </li>
    </div>

  </div>

  <!-- Filtro -->
  <div class="d-flex" style="width: 92vw; justify-content: end">
    <li class="list-group-item ml-0" style="background: none; border: none; border-radius: 10px; text-align: end">
      <p style="font-size:15px; color:#858585; font-weight: bold">Filtro:</p>
    </li>

    <select class="select mb-2 mt-2 mr-3" aria-label="Default select example" style="height: 5vh; border-radius: 10px">
      <option class="option" selected>Periodo de tempo</option>
      <option class="option" value="1">One</option>
      <option class="option" value="2">Two</option>
      <option class="option" value="3">Three</option>
    </select>
  </div>
  <!-- FIM: Filtro -->

  <div class="d-flex">
    <!-- Seção Principal -->
    <section class="ml-3" style="width: 62vw; align-items: center;">
      <div class="d-flex flex-wrap content-normal bg-light" id="infos" style="
      width: 100%;
      height: 8vh;
      border-left: solid 0.3vw #2C9AFF;
      border-radius: 0.5vh;
      align-items: center;
      box-shadow: 0vh 0.1vh 0.3vh 0vh #858585;
      ">

        <table style="margin-top:5px">
          <tr class="indicadores">
            <th>DATA VISITA</th>
          </tr>
          <tr>
            <th>06/12/2022</th>
          </tr>
        </table>

        <a href="" class="d-flex" style="margin-top:5px">Ver Pesquisas
          <svg xmlns="http://www.w3.org/2000/svg" style="width: 2vw; height: 4vh;" fill="currentColor"
            class="bi bi-file-earmark-text ml-1" viewBox="0 0 16 16">
            <path
              d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5" />
            <path
              d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
          </svg>
        </a>

        <a href="" class="d-flex" style="margin-top:5px">Ver Registros
          <svg xmlns="http://www.w3.org/2000/svg" style="width: 2vw; height: 4vh;" fill="currentColor"
            class="bi bi-camera ml-1" viewBox="0 0 16 16">
            <path
              d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4z" />
            <path
              d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5m0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7M3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0" />
          </svg>
        </a>
      </div>
    </section>

    <!-- Seção de Produtos -->
    <div class="d-flex flex-wrap content-normal bg-light justify-content-start ml-3" style="
    width: 28vw;
    border-radius: 0.5vh;
    align-items: flex-start;
    box-shadow: 0vh 0.1vh 0.3vh 0vh #858585;
    padding: 20px;
    margin-bottom: 3vh;
    ">
      <table style="width: 100%; margin-left: 10px">
        <tr class="indicadores">
          <th style="text-align: left; font-size: 15px;">Preço Médio dos Produtos JUA</th>
        </tr>
        <tr>
          <td style="text-align: left; font-size: 13px;">Pesquisa Atualizada em 12/06/2023</td>
        </tr>
      </table>

      <div style="display: flex; align-items: right; margin-top: 1vh;">
        <img
          src="https://phygital-files.mercafacil.com/catalogo/uploads/produto/desinfetante_1l_jua_herbal_e5fca3b1-3444-4700-afeb-1912ba8b8dfa.png"
          alt="Desinfetante Herbal 2L" style="max-width: 50px; height: auto; margin-right: 15px;">
        <div>
          <th style="text-align: left;">Desinfetante herbal 2L</th>
          <p> R$ 11,50 </p>
        </div>
      </div>

      <div style="display: flex; align-items: right; margin-top: 1vh;">
        <img src="https://sabaojua.com.br/Upload/Products/Louca/Prancheta%203_6553c1ab98e9a.png"
          alt="Detergente Maçã 500ml" style="max-width: 50px; height: auto; margin-right: 15px;">
        <div>
          <th style="text-align: left;">Detergente Maçã 500ml</th>
          <p> R$ 11,50 </p>
        </div>
      </div>
    </div>
  </div>

</template>

<style scoped>
.select {
  background: #e7e7e7;
  color: #8d8d8d;
  border-color: #8d8d8d;
}

p:hover {
  background: none;
}

.divSearch {
  display: flex;
  flex-wrap: wrap;
  width: 100%;
  height: 10vh;
  justify-content: end;
  align-items: center;
  padding-inline: 1vw;
}

.divSearch input,
select {
  height: 5vh;
  border-radius: 1vh;
  font-size: 2.2vh;
  border: none;
  margin-inline: 1vw;
}

.divSearch input {
  background-color: #9EDCFF;
  width: 15vw;
}

.divSearch input:focus {
  background-color: #fff;
}

.divSearch select {
  width: 12vw;
  font-size: 2vh;
}

.divSearch p {
  margin-top: 2.5vh;
  font-weight: bold;
  font-size: 2.2vh;
  color: #858585;
}

.divSearch select option {
  font-size: 2.2vh;
}

.divSearch select:after {
  background-color: #c4c4c4;
}

table {
  width: 40%;
}

table tr th {
  font-size: 2vh;
  color: #858585;
}

.indicadores th {
  font-size: 2.2vh;
  color: #000;
  font-weight: bold;
}

#infos a {
  font-size: 2.2vh;
  justify-content: center;
  align-items: center;
  text-decoration: none;
  color: #858585;
  margin-right: 100px;
}

#infos a:hover {
  color: #2C9AFF;
}

.up {
  margin-bottom: 7px;
}

li {
  height: 35px;
  text-align: justify;
}
</style>