<template>
    <div id="all">
        <div class="textbox">
            <h1 class="title">Check-in</h1>
            <h4 class="text">está preste a iniciar seu atendimento, mas antes, precisamos que confirme sua localização
            </h4>
        </div>
        <div class="d-flex" style="gap: 10px; width:100%; justify-content:center">
        <RouterBack style="width: 40%;  font-size:18px"/>
        <a  type="button" @click="RouterButton(this.$route.pesquisaid)" id="routerbutton" class="btn btn-light align-self-center">Iniciar</a>
    </div>
    </div>
</template>
<script>
import RouterBack from '../components/ActionRouterBack.vue'
export default {
    methods: {
        RouterButton(id) {
            this.$router.push({ name: 'pesquisa', params: { pesquisaid: id } });
        }
    },
    components: {
        RouterBack,
    }
}
</script>
<style scoped>
#all{
    margin-top:30%;

}
#routerbutton{
    width: 40%;
    border-radius: 20px;
    border:solid  #858585 0.2vh;
    color:white;
    background-color: #47a6ff;
    font-weight: bold;
    font-size:18px
}
.textbox {
    padding: 20px;
    margin-bottom: 10px;
}

.title {
    margin-bottom: 20PX;
    font: bold;
}

.text {
    color: rgb(112, 112, 112);
}
</style>