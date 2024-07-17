<template>
    <div>
        <button @click="RouterButton(this.$route.pesquisaid)" class="routerbutton">Checkout</button>
    </div>
</template>
<script>
export default {
  methods: {
   RouterButton(id){
      this.$router.push({ name: 'pesquisa', params: { pesquisaid: id} });
    }
  },
  }
</script>