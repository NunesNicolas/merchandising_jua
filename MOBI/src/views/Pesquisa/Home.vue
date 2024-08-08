<script setup>
import axios from "axios";
</script>

<template>
    <div style="height: 25vh; width: 100%">
        <headerEmpresa :visita="pesquisa" />
    </div>
    <div class="info">
        <h5>O que deseja fazer?</h5>
        <OptionButtons :id="this?.$route?.pesquisaid" />
    </div>
    <div class="boxcheck">
        <ActionRouter :disabled="isPromotorConcluido" @click="statusChekout()" class="check" route="/"
            label="Checkout" />
    </div>
</template>

<script>
import ActionRouter from "../../components/ActionRouter.vue";
import OptionButtons from "../../components/OpitionButtons.vue";
import headerEmpresa from "../../components/headerEmpresa.vue";
import axios from "axios";

export default {
    data() {
        console.log("[home pesquisas] route", this?.$route);

        return {
            id: this?.$route?.params?.pesquisaid,
            pesquisa: {},
        };
    },
    methods: {
        async fetchPesquisa() {
            let response = axios.get("/pesquisas/" + this.id);
            this.pesquisa = (await response).data;
            console.log("Dados da pesquisa:", this.pesquisa);
        },

        async statusChekout() {
            if (confirm("Você tem certeza que deseja finalizar o atendimento?")) {
                try {
                    const offset = new Date().getTimezoneOffset() * 60000; // Resolve as 3h de adiantamento
                    this.datetime = new Date(Date.now() - offset).toISOString().slice(0, 19).replace('T', ' '); 
                    let updateData = {
                        checkout_datetime: this.datetime,
                        status: "CONCLUIDO",
                    };
                    console.log("updateData:", updateData);

                    await axios.put("/pesquisas/" + this.id, updateData);
                    alert("Atendimento Finalizado.");
                    this.$router.push({ path: "/" });

                } catch (error) {
                    console.error("Erro ao finalizar atendimento:", error);
                    alert("Erro ao finalizar atendimento.");
                }
            } else {
                this.$router.push({ path: "/pesquisas/" + this.id });
                alert("Atendimento não Finalizado.");
            }
        },

    },
    mounted() {
        this.fetchPesquisa();
    },
    components: {
        OptionButtons,
        headerEmpresa,
        ActionRouter,
    },

    computed: {
        isPromotorConcluido() {
            if (this.pesquisa.status == "CONCLUIDO") {
                return true;
            } else {
                return false;
            }
        },
    },
};
</script>

<style>
.info {
    text-align: center;
}

.info h5 {
    text-align: left;
    color: #a0a0a0;
    font-size: 2.5vh;
    margin-left: 40px;
    margin-top: 30px;
}

.boxcheck button {
    background-color: #2c9aff;
    color: white;
    height: 7vh;
    border: 1px solid;
    margin-top: 3vh;
    font-size: 2.5vh;
}
</style>
