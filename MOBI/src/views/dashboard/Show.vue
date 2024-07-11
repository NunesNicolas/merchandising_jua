<script setup>
import axios from "axios";
</script>

<template>
    <div class="info">

        <h5>Roteiro de Clientes</h5>
        <div class="containercards" v-for="visita in visitas">
        <VisitasCard :visita="visita" :cliente="visita.cliente"/>
    </div>
    </div>
</template>

<script>
import VisitasCard from '../../components/VisitasCard.vue'

export default {
    data() {
        return {
            // visita: {
            //     data: '12/01/12'
            // },
            cliente: {
                nome: 'nome exemplo',
                endereco: 'endereco exemplo',
            },
            visitas: [],
        }
    },
    

    methods: {
     async iniciar() {
        let response = axios.get('/pesquisas/promotor/'+ 1);
        this.visitas = (await response).data;
    },
    },
    mounted() {
        this.iniciar();
    },

    components: {
        VisitasCard,
    },
  }

</script>


<style>
.containercards {
    margin-bottom: 70px;
}
.info {
    text-align: center;
    justify-content: space-evenly;
}

.info h5 {
    text-align: left;
    color: #a0a0a0;
    font-size: 2.5vh;
    margin-left: 40px;
    margin-top: 50px;
    margin-bottom: 8vh;
}
</style>