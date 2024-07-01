<template>
    <div class="page">
        <Breadcrumb pageTitle="Clientes" routeInfo="Dashboard / Clientes" />

        <ActionListWrapper>
            <ActionRouterBack />
        </ActionListWrapper>

        <BoxInfoWrapper>
            <slot>
                <div class="d-flex">
                    <div class="box-line">
                        <img :src="produto.img" height="150px" width="auto" />
                    </div>
                    <div style="width: 100%;">
                        <div class="box-line">
                            <BoxInfo title="Nome" :value="produto.nome"></BoxInfo>
                        </div>
                        <div class="d-flex" style="width: 100%; gap:10px; justify-content:space-between">
                            <div class="box-line" style="width: 50%">
                                <BoxInfo title="Preço médio:" :value="produto.nome"></BoxInfo>
                            </div>
                            <div class="box-line" style="width: 50%">
                                <BoxInfo title="Quantidade de concorrentes:" :value="produto.nome"></BoxInfo>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="divFooter" style="width: 100%">
                    <div class="btnPeso">

                        <router-link :to="{ name: 'infoProdutos', params: { id: button500 } }">
                            <a type="button" class="peso" :class="{ 'botao-ativo': paginaAtual == '500' }" name="500" ac
                                value="" style="border-bottom: solid;border-radius: 0vh 0vh 0vh 1vh;" href="">500g</a>
                        </router-link>

                        <router-link :to="{ name: 'infoProdutos', params: { id: button1000 } }">
                            <a type="button" class="peso" :class="{ 'botao-ativo': paginaAtual == '1000' }" name="1000"
                                style="border-bottom: solid" value="" href="">1kg</a>
                        </router-link>

                        <router-link :to="{ name: 'infoProdutos', params: { id: button5000 } }">
                            <a type="button" class="peso" :class="{ 'botao-ativo': paginaAtual == '5000' }" name="5000"
                                style="border-bottom: solid" value="" href="">5kg</a>
                        </router-link>


                    </div>

                </div>
            </slot>
        </BoxInfoWrapper>

    </div>
</template>

<script>

import axios from 'axios';
import ActionListWrapper from "../../components/ActionListWrapper.vue";
import ActionRouterBack from "../../components/ActionRouterBack.vue";
import BoxInfoWrapper from "../../components/Box/BoxInfoWrapper.vue";
import BoxInfo from "../../components/Box/BoxInfo.vue";
import Breadcrumb from "../../components/Breadcrumb.vue";
import CardList from '../../components/CardList.vue';

export default {

    data() {
        return {
            id: this.$route.params.id,
            produto: "",
            competitors: [],
            variants: [],
            temCompetitors: false,
            paginaAtual: 500,
            button500: 0,
            button1000: 0,
            button5000: 0,
            // bodyAll: 'bodyBase',
            // topDiv: 'topBase'

        };
    },

    methods: {
        async getProdutos() {
            let response = axios.get("/produtos/" + this.id);
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

        // modificarEstilo() {
        //     if (this.bodyAll == 'bodyBase') {
        //         this.bodyAll = 'bodyMod';
        //         this.topDiv = 'topMod';
        //     } else {
        //         this.bodyAll = 'bodyBase';
        //         this.topDiv = 'topBase';
        //     }

        // }

    },

    components: {
        ActionListWrapper,
        ActionRouterBack,
        BoxInfoWrapper,
        BoxInfo,
        Breadcrumb,
        CardList
    },

    mounted() {
        this.getProdutos();
    }

}
</script>

<style scoped>
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
    color: #2C9AFF;
  }
  
  .peso:hover {
    border-bottom: solid #2C9AFF;
  }
</style>
