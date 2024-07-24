<script setup>
import axios from "axios";
</script>

<template>
    <div style="height: 25vh; width: 100%">
        <headerEmpresa :visita="pesquisa" />
    </div>
    <div class="info">
        <h5>O que deseja fazer?</h5>
        <OptionButtons :id="this.$route.pesquisaid" />
    </div>
    <div class="check">
        <ActionRouter @click="statusChekout();" class="check" route="" label="Checkout" />
    </div>
    
</template>

<script>
import ActionRouter from '../../components/ActionRouter.vue'
import OptionButtons from '../../components/OpitionButtons.vue'
import headerEmpresa from "../../components/headerEmpresa.vue";
import axios from 'axios';

export default {
    data() {
        return {
            id: this.$route.params.pesquisaid,
            pesquisa: {},
        }
    },
    methods: {
        async fetchPesquisa() {
            let response = axios.get('/pesquisas/' + this.id)
            this.pesquisa = (await response).data;
            console.log('Dados da pesquisa:', this.pesquisa);
        },
        async statusChekout() {
            if (confirm(`Você tem certeza que deseja finalizar o atendimento?`)) {
                let updateData = { status: 'CONCLUIDO'};
                axios.put('/pesquisas/' +  this.id,  updateData);
                alert('Atendimento Finalizado.')
                this.$router.push({ path: '/' }); 
            }
            else{
                alert('Atendimento não Finalizado.')
            }
        }
    },
    mounted() {
        this.fetchPesquisa();
    },

    components: {
        OptionButtons,
        headerEmpresa,
        ActionRouter
    },

}
</script>


<style scoped>
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
</style>