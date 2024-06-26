<template>
        <div class="d-flex" v-for="empresa in empresas" :key="empresa.id">
            <div class="d-flex flex-wrap content-normal bg-light ml-4" id="infos" style="">
                <table style="width: 80%;">
                <thead>
                <tr class="indicadores">
                        <th>CNPJ</th>
                        <th>CLIENTE</th>
                        <th>PROMOTORES</th>
                        <th>ÚLTIMA PESQUISA</th>
                        <th>ÚLTIMA VISITA</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>{{ empresa.cnpj }}</th>
                    <th>{{ empresa.nome }}</th>
                    <th>{{ empresa.promotor_id }}</th>
                    <th>06/01/24 às 22:12</th>
                    <th>07/02/24 às 10:12</th>
                </tr>
                </tbody>
                </table>
                <router-link to="empresas/1" class="d-flex flex-wrap">Ver atividade 
                <svg xmlns="http://www.w3.org/2000/svg" style="width: 2vw; height: 4vh;" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                    <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5"/>
                    <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                </svg>
                </router-link>
            </div>
        </div> 
</template>

<script>
export default {
   props: {
    empresas: Array,

   },
   methods: {
    async getPromotores(){
    let response = axios.get('/promotores/'+ this.empresa.promotor_id);
    this.promotor =(await response).data.promotor;
    },
   }
}
</script>

<style scoped>

#infos{
    font-size: 2.2vh;
    justify-content: center;
    align-items: center;
    text-decoration: none;
    color: #858585;
    width: 95%;
    height: 8vh;
    border-left:
    solid 0.3vw #2C9AFF;
    margin-top: 3vh;
    border-radius: 0.5vh;
    align-items: center;
    justify-content:space-evenly;
    box-shadow: 0vh 0.1vh 0.3vh 0vh #858585;
  }
.indicadores{
    color:black;
}

</style>