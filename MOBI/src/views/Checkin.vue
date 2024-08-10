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
            <a type="button" @click="getGeoLocation();" id="routerbutton" class="btn btn-light align-self-center"
                style="border-radius: 10px">Iniciar</a>
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
            targetPosition: {
                latitude: -7.267025,    // Latitude do ponto B
                longitude: -39.304009,// Longitude do ponto B
            },
            geoloc: null,
            distance: null,
            pesquisaid: this.$route.params.pesquisaid,
        }
    },
    methods: {
        getGeoLocation() {
            this.datetime = new Date();
            window.navigator.geolocation.getCurrentPosition(this.navtrue, this.navfalse);
        },

        navtrue(geoloc) {
            this.geoloc = geoloc;
            this.calculateDistance();   
            if (this.distance <= 20) {
                console.log('distance', this.distance, 'Geolocation:', geoloc);
            const formatted = useDateFormat(useNow(), 'YYYY-MM-DD HH:mm:ss')
            this.iniPesquisa(formatted.value);
            this.RouterButton(this.$route.pesquisaid);
            } else {
                alert('Você está muito longe do ponto de atendimento. Por favor, verifique sua localização')
            }
            
        },

        navfalse(geoloc) {
            console.error(geoloc);
        },

        async iniPesquisa(datetime) {
            console.log(datetime)

            let updateData = { checkin_datetime: datetime, status: 'ABERTO' };

            axios.put('/pesquisas/' + this.pesquisaid, updateData)
        },

        RouterButton(id) {
            this.$router.push({ name: 'pesquisa', params: { pesquisaid: id } });
        },


        calculateDistance() {
      if (this.geoloc && this.targetPosition) {
        const lat1 = this.geoloc.coords.latitude;
        const lon1 = this.geoloc.coords.longitude;
        const lat2 = this.targetPosition.latitude;
        const lon2 = this.targetPosition.longitude;
        this.distance = this.getDistanceFromLatLonInKm(lat1, lon1, lat2, lon2);
      }
    },

    getDistanceFromLatLonInKm(lat1, lon1, lat2, lon2) {
      const R = 6371; // Raio da Terra em km
      const dLat = this.deg2rad(lat2 - lat1);
      const dLon = this.deg2rad(lon2 - lon1);
      const a = 
        Math.sin(dLat / 2) * Math.sin(dLat / 2) +
        Math.cos(this.deg2rad(lat1)) * Math.cos(this.deg2rad(lat2)) * 
        Math.sin(dLon / 2) * Math.sin(dLon / 2); 
      const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a)); 
      const d = R * c; // Distância em km
      return d;
    },
    deg2rad(deg) {
      return deg * (Math.PI / 180);
    }
    },
    computed: {
    formattedDistance() {
      return this.distance ? this.distance.toFixed(2) : 'Calculando...';
    }
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