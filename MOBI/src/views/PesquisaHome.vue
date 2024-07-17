<script setup>
import axios from "axios";
</script>

<template>

    <div class="info">
        <h5>O que deseja fazer?</h5>
        <OptionButtons :id="this.$route.pesquisaid"/>
    </div>

</template>

<script>
import OptionButtons from '../components/OpitionButtons.vue'

export default {

    components: {
        OptionButtons,
    },

}
</script>


<style>


.info {
    text-align: center;
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