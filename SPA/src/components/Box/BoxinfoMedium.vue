<template>
    <div class="bg-white d-flex"
        style=" justify-content: space-evenly; flex-wrap: wrap; width: 20vw; height:20vh; border-radius: 1vh; padding: 1vh; box-shadow: 0vh 0vh 0.1vh 0.1vh #c0c0c0;">
        <h5 style=" width: 17vw; height: 9vh;">{{ title }}:</h5>
        <slot name="icon" :item="item"></slot>
        <div style="height: 6vh; width: 20vw;">
            <slot name="actions" :item="item">

            </slot> 
        </div>
        <div class="d-flex" v-if="subtitle">
            <p style="font-size: 1.5vh; height:3vh;">{{ subtitle }}:</p>
            <p style="font-size: 1.5vh; height:3vh; margin-left: 10px">{{ date }}</p>
        </div>
       
    </div>
</template>

<script>
export default {
    name: 'BoxMedium',
    props: {
        title: {
            type: String,
            required: true,
        },
        subtitle: {
            type: String,
            required: true,
        },
        date: {
            type: Date,
            required: true,
        },
        value: {
            type: String,
            required: false
        }
    }
}
</script>

<style></style>