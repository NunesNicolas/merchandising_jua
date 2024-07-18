<template>

    <div class="registro-card" v-for="work in workregs">

        <img v-if="work.img" :src=work.img />
        <img v-else src="https://media.istockphoto.com/id/1409329028/vector/no-picture-available-placeholder-thumbnail-icon-illustration-design.jpg?s=612x612&w=0&k=20&c=_zOuJu755g2eEUioiOUdz_mHKJQJn-tDgIAhQzyeKUQ=">
        
        
        <div>
            <div class="d-flex">
            <h5 class="label">TÍTULO:</h5>
            <h5> {{ work.title }} </h5>
            </div>
            <div class="d-flex">
                <p class="label">CATEGORIA:</p>
                <p> {{ work.type }}  </p>
            </div>
        </div>
        <i class="bi bi-trash" style="font-size: 25px; color: red"></i>
    </div>

</template>

<script>

export default {
    props: {
        workregs: {type: Array,
            requerid: true,
        },
    },
}

</script>

<style>

.label{
    color: grey;
}

.registro-card{
    margin-inline: 5%;
    flex-wrap: wrap;
    display: flex;
    background-color: #f0f0f0;
    color: #2C9AFF;
    width: 90%;
    height: 10vh;
    margin-top: 3vh;
    border-radius: 20px;
    box-shadow: 0vh 0.5vh 0.5vh 0.1vh #979797;
    text-align: left;
    align-items: center;
}

.registro-card img{
    margin-left: 10px;
    border-radius: 20px;
    width: 22%;
    height: 80%;
}

.registro-card h5 {
    font-weight: bold;
    font-size:medium;
    margin-left: 25px;
    margin-top: 10px;
}
.registro-card p {
    margin-left: 25px;
}
.registro-card i {
    margin-left: 60px;
}
    
</style>