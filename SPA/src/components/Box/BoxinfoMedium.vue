<template>
    <div class="bg-white d-flex"
        style=" justify-content: space-evenly; flex-wrap: wrap; width: 20vw; height:20vh; border-radius: 1vh; padding: 1vh; box-shadow: 0vh 0vh 0.1vh 0.1vh #c0c0c0;">
        <h6 style=" width: 15vw; height: 9vh;">{{ title }}:</h6>
        <slot name="icon" :item="item"></slot>
        <div style="height: 6vh; width: 20vw;"></div>
        <div class="d-flex" v-if="subtitle">
            <p style="font-size: 1.5vh; height:3vh;">{{ subtitle }}:</p>
            <p style="font-size: 1.5vh; height:3vh; margin-left: 10px">{{date}}</p>
        </div>
        <slot name="actions" :item="item"></slot>
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