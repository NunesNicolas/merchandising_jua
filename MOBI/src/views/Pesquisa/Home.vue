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

</template>

<script>
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
    },
    mounted() {
        this.fetchPesquisa();
    },

    components: {
        OptionButtons,
        headerEmpresa,
    },

}
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
</style>