<script setup>
import ActionListWrapper from "../../components/ActionListWrapper.vue";
import ActionRouterBack from "../../components/ActionRouterBack.vue";
import BoxInfoWrapper from "../../components/BoxInfoWrapper.vue";
import Breadcrumb from "../../components/Breadcrumb.vue";
</script>

<template>
    <div class="page">
        <Breadcrumb pageTitle="Clientes" routeInfo="Dashboard / Clientes" />

        <ActionListWrapper>
            <ActionRouterBack :label="'voltar'" />
        </ActionListWrapper>

        <BoxInfoWrapper>
            <slot>

                <div class="box-line">
                    <div class="box-info">
                        <label class="box-label">Nome</label>
                        <input class="box-input" :value="Juá" disabled />
                    </div>
                    <div class="box-info">
                        <label class="box-label">CNPJ</label>
                        <input class="box-input" :value="123123" disabled />
                    </div>
                </div>

                <div class="box-line">
                    <div class="box-info">
                    <label class="box-label">Endereço</label>
                    <input class="box-input" :value="'São Lazaro'" disabled />
                </div>
                </div>
            </slot>

            
        </BoxInfoWrapper>
    </div>
</template>

<style scoped>


.box-line {
  display: flex;
  flex-direction: row;
  align-items: flex-start;
  width: 100%;
  gap: 1em;
}

.box-info {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  width: 100%;
  margin-bottom: 1em;
}
.box-label {
  font-size: 15px;
  color: #858585;
  font-weight: bold;
  margin-bottom: 0.5em;
  display: block;
}
.box-input {
  width: 100%;
  background-color: #eee;
  border: none;
  padding: 0.5em;
  font-size: 15px;
  color: #8d8d8d;
  border-radius: 5px;
  box-sizing: border-box;
}

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