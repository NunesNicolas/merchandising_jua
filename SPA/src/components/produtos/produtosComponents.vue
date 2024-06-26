
<template>
    <div class="d-flex" style="flex-wrap: wrap;">
        <div class="d-flex" v-for="produto in produtos" :key="produto.id">
            <div class="card" style="justify-content: center; align-items: center; border-radius: 10px; width: 280px; height: 300px; display: flex; margin: 10px;" >
            <img class="" style="height: 33vh; width: 33vh;" :src=produto.img alt="imagem não encontrada" >
            <h5 style="color:#8d8d8d">{{ produto.nome }} </h5>
            <div class="mt-2" style="text-align: center">
            <router-link :to="{name: 'InfoProdutos', params: {id: produto.id}}"><a href="" class="btn btn-primary" style="border:none;text-align: center; background: #2c9aff; width: 250px">Detalhe</a></router-link>        
            </div>
            </div>
        </div>
    </div> 
</template>


<script>
export default {
   props: {
    produtos: Array,

   }
}
</script>

<style scoped></style>