<template>
    <div class="page">
        <Breadcrumb pageTitle="Produtos" routeInfo="Dashboard / Produtos" />

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
                                <BoxInfo title="Preço médio:"></BoxInfo>
                            </div>
                            <div class="box-line" style="width: 50%">
                                <BoxInfo title="Quantidade de concorrentes:" :value="competitors.length"></BoxInfo>
                            </div>
                        </div>
                    </div>
                    <i class="bi bi-exclamation-circle-fill" style="color: red;"></i>
                    <router-link :to="{
                        name: 'UpdateProdutos',
                        params: { id: this.$route.params.id },
                    }">
                        <i class="bi bi-pencil-square ml-2" style="font-size: 17px; color:dodgerblue"></i>
                    </router-link>
                </div>

                <div class="divFooter" style="width: 100%">

                        <FooterButtons
                        :id="id"
                        :label = "'weight'"
                        :instance = "produto"
                        :items="variants"
                        :defaults="[
                            { weight: '200g' },
                            { weight: '500g' },
                            { weight: '1kg' },
                            { weight: '5kg' },
                            { weight: '500ml' },
                            { weight: '1l' },
                            { weight: '2l' },
                            { weight: '5l' },
                        ]"
                        />


                        <!-- <router-link  :to="{ name: 'infoProdutos', params: { id: button500 } }">
                            <a type="button" class="peso" :class="{ 'botao-ativo': paginaAtual == '500' }" name="500" ac
                                value="" style="border-bottom: solid;border-radius: 0vh 0vh 0vh 1vh;" href="">500g</a>
                        </router-link>

                         <router-link :to="{ name: 'infoProdutos', params: { id: button1000 } }">
                            <a type="button" class="peso" :class="{ 'botao-ativo': paginaAtual == '1000' }" name="1000"
                                style="border-bottom: solid" value="" href="">1kg</a>
                        </router-link> 

                        <router-link v-for="variant in variants" :key="variant.id" :to="{ name: 'infoProdutos', params: { id: button5000 } }">
                            <a type="button" class="peso" :class="{ 'botao-ativo': paginaAtual == '5000' }" name="5000"
                                style="border-bottom: solid" value="" href="">5kg</a>
                        </router-link> -->


                </div>

            </slot>
        </BoxInfoWrapper>

        <div class="btCompetitorAdd">
            <router-link :to="{
                name: 'CreateCompetitors',
                params: { id: this.$route.params.id },
            }">
                <h5 style="color: white; text-align:center">Adicionar Concorrente</h5>
            </router-link>
        </div>

    <DetalhesModal  :items="competitors" :value="produto.nome" :fields="{
        nome: '',
        
    }">

    </DetalhesModal>
    

    <competitorsComponents @modificarEstilo="modificarEstilo" :competitors="competitors" />

        <CardList :items="competitors" :fields="{
            nome: 'PRODUTOS',
            brand: 'CONCORRENTES',
        }">
            <template v-slot:actions="{ item }">
                <router-link :to="{
                    name: 'UpdateCompetitors',
                    params: {
                        id: this.$route.params.id,
                        compid: item.id
                    },
                }" class="d-flex flex-wrap">
                    <i class="bi bi-pencil-square" style="font-size: 2rem; color:grey"></i>
                </router-link>
                <div class="d-flex flex-wrap">
                    <i  class="bi bi-file-earmark-text" style="font-size: 2rem; color:grey"></i>
                </div>
            </template>

        </CardList>

    </div>


</template>

<script>

import axios from 'axios';
import ActionListWrapper from "../../components/ActionListWrapper.vue";
import ActionRouterBack from "../../components/ActionRouterBack.vue";
import ActionRouter from "../../components/ActionRouter.vue";
import BoxInfoWrapper from "../../components/Box/BoxInfoWrapper.vue";
import BoxInfo from "../../components/Box/BoxInfo.vue";
import Breadcrumb from "../../components/Breadcrumb.vue";
import CardList from '../../components/CardList.vue';
import competitorsComponents from '../../components/produtos/competitorsComponents.vue';
import DetalhesModal from '../../components/produtos/modals/DetalhesModal.vue';
import FooterButtons from '../../components/FooterButtons.vue'


export default {

    data() {
        return {
            id: this.$route.params.id,
            produto: "",
            competitors: [],
            variants: [],
            weights: [],
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
        async getProdutos() {
            let response = axios.get("/produtos/" + this.id);
            this.competitors = (await response).data.competitorsthis;
            this.variants = (await response).data.produtovariants;
            this.produto = (await response).data.produto;
            this.paginaAtual = this.produto.weight;

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
        ActionListWrapper,
        ActionRouterBack,
        ActionRouter,
        BoxInfoWrapper,
        BoxInfo,
        Breadcrumb,
        competitorsComponents,
        CardList,
        DetalhesModal,
        FooterButtons
    },

    mounted() {
        this.getProdutos();
    }

}
</script>

<style scoped>
.btCompetitorAdd {
    text-align: left;
    margin-top: 25px;
    margin-left: 15px;
    border-radius: 10px;
    background-color: #2C9AFF;
    width: 17%;
    height: 50%;

}

.bi.bi-pencil-square {
    color: #2C9AFF;
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
    flex-wrap:nowrap;
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
