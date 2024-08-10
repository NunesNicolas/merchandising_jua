<template>

    <div class="registro-card" v-for="work in workregs" :key="work.id">

        <div class="componentes">
        <img v-if="work.img" :src=work.img />
        <img v-else src="https://media.istockphoto.com/id/1409329028/vector/no-picture-available-placeholder-thumbnail-icon-illustration-design.jpg?s=612x612&w=0&k=20&c=_zOuJu755g2eEUioiOUdz_mHKJQJn-tDgIAhQzyeKUQ=">
        
        
        <div>
            <div class="d-flex">
            <h5 class="label">TÍTULO:</h5>
            <h5 v-if="work && work.title">{{formatarNome(work.title, 2) }}</h5>
            </div>
            <div class="d-flex">
                <p class="label">CATEGORIA:</p>
                <p> {{ work.type }}  </p>
            </div>
        </div>
    </div>
        <slot name="actions" :work="work"></slot>
    </div>

</template>

<script>

export default {
    props: {
        workregs: {
            type: Array,
            requerid: true,
        },
        
    },
    methods: {
    iniciar(){
      this.work = JSON.parse(localStorage.getItem('worker'));
    },
    formatarNome(nome, limite) {
        const palavras = nome.split(' ');
        return palavras.slice(0, limite).join(' ');
    }
    },
    mounted() {
        this.iniciar();
        },
}

</script>

<style scoped>
.d-flex:not(:last-child) {
    margin-bottom: 10px;
  }

.label{
    color: grey;
}

.registro-card{
    margin-inline: 5%;
    display: flex;
    background-color: #ffffff;
    color: #2C9AFF;
    width: 90%;
    height: 10vh;
    margin-top: 3vh;
    border-radius: 20px;
    box-shadow: 0vh 0.2vh 0.2vh 0vh #d2d1d1;
    align-items: center;
}

.componentes{
    display: flex;
    text-align: left;
    align-items: center;
    justify-content: flex-start;
}

.componentes img{
    margin-left: 10px;
    border-radius: 20px;
    width: 25%;
    height: 85%;
}

.componentes h5 {
    font-weight: bold;
    font-size:medium;
    margin-left: 13px;
    margin-top: 10px;
}

.componentes p {
    margin-left: 13px;
    margin-bottom: 1vh;
}
    
</style>