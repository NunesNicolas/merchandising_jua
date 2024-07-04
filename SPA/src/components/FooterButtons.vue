<template>
    <div class="btnPeso">
        <!-- <div>
        <router-link  :to="{ name: 'infoProdutos', params: { id: button500 } }">
            <a type="button" class="peso" :class="{ 'botao-ativo': paginaAtual == '500' }" name="500" ac
                value="" style="border-bottom: solid;border-radius: 0vh 0vh 0vh 1vh;" href="">500g</a>
        </router-link> -->
        <div v-for="defou in defaults">
            <div v-for="item in items">
        <router-link v-if="defou[label] == item[label] " :to="{ name: 'infoProdutos', params: { id: item.id } }">
            <a type="button" :id="item.id" class="peso" :class="{ 'botao-ativo': item.id == id }"  :name="item[label]"
                style="border-bottom: solid" value="" href="">{{item[label]}}</a>
        </router-link>
    </div>
    </div>
    </div>
</template>
<script>
export default {
    props: {
        id: '',
        label: String,
        defaults: Array,
        items: Array,
        instance: Object
    },

}


</script>

<style>
.btnPeso {
    width: 30vw;
    height: 11vh;
    border: none;
    text-align: left;
    display: flex;
}

.peso {
    width: 5vw;
    height: 7vh;
    text-align: center;
    margin-top: 3.8vh;
    background-color: transparent;
    border: none;
    color: #858585;
    border-bottom: 0.1vh solid;
    text-decoration: none;
}
.botao-ativo {
    width: 5vw;
    height: 7vh;
    text-align: center;
    margin-top: 3.8vh;
    background-color: transparent;
    border: none;
    color: #5CB0FF;
    border-bottom: 0.1vh solid;
    text-decoration: none;
    
}
</style>