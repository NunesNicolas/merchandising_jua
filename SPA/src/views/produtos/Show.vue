<template>
    <div>
        <Breadcrumb pageTitle="Produtos" routeInfo="Dashboard / Produtos" />

        <ActionListWrapper>
            <ActionRouterBack />
        </ActionListWrapper>

        <div class="page" id="BodyAll" ref="BodyAll">
            <BoxInfoWrapper>
                <slot>
                    <div class="topIcons">
                        <DeleteBT :item="produto" :label="'nome'" :url="'/produtos/'" />
                        <router-link :to="{
                            name: 'UpdateProdutos',
                            params: { id: this.$route.params.id },
                        }">
                            <i class="bi bi-pencil-square ml-1" style="font-size: 25px; color:dodgerblue"></i>
                        </router-link>
                    </div>
                    <div class="d-flex" style="gap:20px">
                        <div class="box-line">
                            <img :src="produto.img" height="150px" width="auto" />
                        </div>
                        <div style="width: 100%;">
                            <div class="box-line">
                                <BoxInfo title="Nome" :value="produto.nome"></BoxInfo>
                            </div>
                            <div class="d-flex" style="width: 100%; gap:10px; justify-content:space-between">
                                <div class="box-line" style="width: 50%">
                                    <BoxInfo title="Preço médio:" :value="'R$' + precoMedio(this.precos).toFixed(2)">
                                    </BoxInfo>
                                </div>
                                <div class="box-line" style="width: 50%">
                                    <BoxInfo title="Quantidade de concorrentes:" :value="competitors.length"></BoxInfo>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="divFooter" style="width: 100%">

                        <FooterButtons :id="id" :label="'weight'" :instance="produto" :items="variants"
                            :defaults="weights" />

                        <b-button v-b-modal.modal-1 class="" style="padding: 5px; background-color: white; margin: 2px">
                            <i class="bi bi-plus-circle" style="font-size:30px; color: black; border: none"></i>
                        </b-button>
                        <b-modal id="modal-1" hide-footer title="Editar Tamanho do Produto">
                            <CheckBox @util="updateweights" :options="variants" :value="'id'" :label="'weight'"
                                :instance="produto" :defaults="weights">
                                <slot>
                                    <b-button style="height:6vh;margin-top:10px" v-b-modal.modal-1>Cancelar</b-button>
                                </slot>
                            </CheckBox>
                        </b-modal>
                    </div>

                </slot>
            </BoxInfoWrapper>

            <div class="btCompetitorAdd">
                <router-link :to="{
                    name: 'CreateCompetitors',
                    params: { id: this.$route.params.id },
                }">
                    Adicionar Concorrente
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

                    <DetalhesModal @modificarEstilo="modificarEstilo" @toggleModal="toggleModal()"
                        v-show="modalEdit == item.id" :title="'DETALHES PRODUTO CONCORRENTE'" :value="modalEdit"
                        :item="item" :fields="{
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
                                    </thead>
                                    <tbody>
                                        <tr v-for="competitorSurvey in item.prices" :key="competitorSurvey.cliente_id">
                                            <td>{{ competitorSurvey.clienteNome }}</td>
                                            <td>R$ {{ precoEspecifico(competitorSurvey).toFixed(2) }}</td>
                                            <td>R$ {{competitorSurvey.price.toFixed(2)}}</td>
                                        </tr>
                                    </tbody>
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
import CardList from '../../components/CardList.vue';
import competitorsComponents from '../../components/produtos/competitorsComponents.vue';
import DetalhesModal from '../../components/modals/DetalhesModal.vue';
import FooterButtons from '../../components/FooterButtons.vue';
import DeleteBT from '../../components/delete.vue';
import CheckBox from '../../components/circleCheck.vue';


export default {
    data() {
        return {
            id: this.$route.params.id,
            produto: "",
            competitors: [],
            variants: [],
            weights: [],
            precos: [],
            temCompetitors: false,
            modalEdit: "",
            BodyAll: "page",
            weights: [
                { weight: '200g' },
                { weight: '500g' },
                { weight: '1kg' },
                { weight: '5kg' },
                { weight: '500ml' },
                { weight: '1l' },
                { weight: '2l' },
                { weight: '5l' },
            ]
        };
    },

    methods: {
        async getProdutos() {
            let response = axios.get("/produtos/" + this.id);
            this.competitors = (await response).data.competitorsthis;
            this.competitors.forEach((competitor) => {
                competitor.prices.forEach((competitorSurvey) => {
                    this.getClienteNome(competitorSurvey);
                });
            });
            this.variants = (await response).data.produtovariants;
            this.produto = (await response).data.produto;
            this.precos = (await response).data.ultimosprecos;
            console.log(this.competitors)

            this.paginaAtual = this.produto.weight;

            if (this.competitors[0] != null) {
                this.temCompetitors = true;
            }
        },
        toggleModal(id) {
            const bodyAllElement = this.$refs.BodyAll;
            if (this.modalEdit == id) {
                this.modalEdit = null;
                this.modificarEstilo();
            } else if (this.modalEdit != id && !bodyAllElement.classList.contains('pageMod')) {
                this.modalEdit = id;
                this.modificarEstilo();
            } else {
                this.modalEdit = id;
            }

        },
        modificarEstilo() {
            this.$refs.BodyAll.classList.toggle("pageMod");
        },

        precoMedio(values) {
            const sum = values.reduce((a, b) => a + b.price, 0);
            const average = sum / values.length;
            return average;
        },

        updateweights(selecteds) {
            const existem = selecteds.filter(item => !this.variants.find(b => b.weight == item));
            const weights = existem.filter(element => element != this.produto.weight);
            const formData = { weights: weights, nome: this.produto.nome, img: this.produto.img }

            if (weights.length > 0) {
                console.log(formData)
                axios.post('/produtos', formData)
                    .then(response => {
                        console.log(response);
                        window.location.reload();
                    })
                    .catch(error => {
                        console.error(error);
                    });

            }
        },

        async nomeCliente(clienteid) {
            try {
                const response = await axios.get('/clientes/' + clienteid);
                this.cliente = response.data;
                return this.cliente.nome;
            } catch (error) {
                console.error('Error fetching client data:', error);
            }
        },

        async getClienteNome(competitorSurvey) {
            competitorSurvey.clienteNome = await this.nomeCliente(competitorSurvey.cliente_id);
        },

        precoEspecifico(competitorSurvey) {
    const preco = this.precos.find(p => p.cliente_id == competitorSurvey.cliente_id);
    return preco ? preco.price : 0;
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
        CheckBox,
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

.topIcons {
    display: flex;
    text-align: end;
    justify-content: end;
    gap: 20px;
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

.bi.bi-file-earmark-text {
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
    text-align: center;
    margin-top: 25px;
    margin-left: 15px;
    border-radius: 10px;
    background-color: #2c9aff;
    color: white;
    font-size: 22px;
    width: 17%;
    height: auto;
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
    margin-top: 3vh;
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
