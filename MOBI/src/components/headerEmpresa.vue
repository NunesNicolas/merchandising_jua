<template>
    <div style="height: 25vh; width: 100%;">
        <header class="header-empresa">
            <div>
                <h6>Cliente:</h6>

                {{ visita.checkout_datetime }}
        
                <p>{{ visita?.cliente?.nome }}</p>
                <h6>Endereço:</h6>
                <p>{{ visita?.cliente?.endereco }}</p>
                <h6>Tempo de Pesquisa:</h6>
                <p v-if="visita.checkout_datetime">{{ tempoDePesquisa }}</p>
                <p v-else>{{ timeElapsedString }}</p>
                
            </div>
            <img src="../assets/nova-logo.png">
        </header>
    </div>

</template>

<script>

export default {
    props: {
        visita: {
            type: Object,
            required: true,
        },
    },
    data() {
        return {
            timeElapsedString: '',
            checkoutEnd: '',
        }
    },
    
    computed: {
        // TEM Q TERMINAR
        tempoDePesquisa() {
            const checkinDateTime = new Date(this.visita.checkin_datetime);
            const checkoutDateTime = new Date(this.visita.checkout_datetime);
            const Dif = checkoutDateTime.getTime() - checkinDateTime.getTime();
            const checkoutEnd = this.formatTimeElapsed(Dif);
            return checkoutEnd;
    },

        timeElapsed() {
            if (!this.visita.checkout_datetime) {
                const checkinDateTime = new Date(this.visita.checkin_datetime);
            const now = new Date();
            const timeDiff = now.getTime() - checkinDateTime.getTime();
            const timeElapsedString = this.formatTimeElapsed(timeDiff);
            return timeElapsedString;
            }else{
                const checkinDateTime = new Date(this.visita.checkin_datetime);
            const checkoutDateTime = new Date(this.visita.checkout_datetime);
            const Dif = checkoutDateTime.getTime() - checkinDateTime.getTime();
            const checkoutEnd = this.formatTimeElapsed(Dif);
            return checkoutEnd;
            }
            
        }
    },

    mounted() {
        this.updateTimeElapsed();
        setInterval(() => {
            this.updateTimeElapsed();
        }, 1000); // update every 1 second
    },

    methods: {
        updateTimeElapsed() {
            const checkinDateTime = new Date(this.visita.checkin_datetime);
            const now = new Date();
            const timeDiff = now.getTime() - checkinDateTime.getTime();
            this.timeElapsedString = this.formatTimeElapsed(timeDiff);
        },
        formatTimeElapsed(timeDiff) {
            const seconds = Math.floor(timeDiff / 1000);
            const minutes = Math.floor(seconds / 60);
            const hours = Math.floor(minutes / 60);
            const days = Math.floor(hours / 24);

            let timeElapsedString = '';
            if (days > 0) {
                timeElapsedString += `${days} dia${days > 1 ? 's' : ''} `;
            }
            if (hours > 0) {
                timeElapsedString += `${hours % 24} hora${hours > 1 ? 's' : ''} `;
            }
            if (minutes > 0) {
                timeElapsedString += `${minutes % 60} minuto${minutes > 1 ? 's' : ''} `;
            }
            if (seconds > 0) {
                timeElapsedString += `${seconds % 60} segundo${seconds > 1 ? 's' : ''}`;
            }

            return timeElapsedString.trim();
        }
    }

}
</script>

<style>
.header-empresa {
    display: flex;
    flex-wrap: wrap;
    width: 100%;
    height: 24vh;
    background-color: #2C9AFF;
    color: #ffffff;
    align-items: center;
    position: absolute;
    z-index: 1;
    overflow: hidden;
    animation-name: startAnimation;
    animation-duration: 1s;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;

}

.header-empresa div {
    display: flex;
    flex-wrap: wrap;
    width: 60%;
    height: 100%;
    padding-left: 5vw;
    padding-top: 3vh;
    padding-bottom: 1vh;
    text-align: start;

}

.header-empresa img {
    width: 25vw;
    height: 8vh;
    margin-left: 10vw;
    margin-bottom: 12vh;
}

.header-empresa div h6 {
    width: 100%;
    font-weight: bold;
    padding: 0;
}

@keyframes startAnimation {
    0% {
        height: 0vh;
    }

    ;

    100% {
        height: 6vh;
    }
}
</style>
