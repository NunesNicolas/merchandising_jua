<script setup>
import { useDateFormat, useNow } from '@vueuse/core'
</script>
<template>
    <div id="all">
        <div class="textbox">
            <h1 class="title">Check-in</h1>
            <h4 class="text">está preste a iniciar seu atendimento, mas antes, precisamos que confirme sua localização
            </h4>
        </div>
        <div class="d-grid" style="gap:25px; width:100%; justify-content:center">
            <RouterBack style="font-size:20px" />
            <a type="button" @click="getGeoLocation();" id="routerbutton"
                class="btn btn-light align-self-center">Iniciar</a>
        </div>
    </div>
</template>
<script>
import RouterBack from '../components/ActionRouterBack.vue'
import axios from 'axios'

export default {
    data() {
        return {
            datetime: null,
            pesquisaid: this.$route.params.pesquisaid,
        }
    },
    methods: {
        getGeoLocation() {
            this.datetime = new Date();
            window.navigator.geolocation.getCurrentPosition(this.navtrue, this.navfalse);
        },

        navtrue(geoloc) {
            console.log('Geolocation:', geoloc);
            const formatted = useDateFormat(useNow(), 'YYYY-MM-DD HH:mm:ss')
            this.iniPesquisa(formatted.value);
            this.RouterButton(this.$route.pesquisaid);
        },

        navfalse(geoloc) {
            console.error(geoloc);
        },

        async iniPesquisa(datetime) {
            console.log(datetime)
            let updateData = { checkin_datetime: datetime, status: 'ABERTO'};   
            
            axios.put('/pesquisas/' +  this.pesquisaid,  updateData)
        },

        RouterButton(id) {
            this.$router.push({ name: 'pesquisa', params: { pesquisaid: id } });
        },
    },
    components: {
        RouterBack,
    }
}
</script>
<style scoped>
#all {
    margin-top: 30%;

}

#routerbutton {
    border-radius: 20px;
    border: solid #858585 0.2vh;
    color: white;
    background-color: #47a6ff;
    font-weight: bold;
    font-size: 20px
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