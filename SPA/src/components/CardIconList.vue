<template>
    <div v-if="items.length === 0" style="width: 100%;">
        <h3>Não há dados disponíveis.</h3>
    </div>

    <div v-else v-for="item in items" :key="item.id" class="card-container"
        style="display: flex;">
        <div class="card"
            style="justify-content: center; border-radius: 10px; width: 235px; display: flex; text-align: left;">
            <div class="card-body">
                <slot name="topactions" :item="item">
                </slot>
                <div v-if="!this.fields.img">
                    <svg viewBox="0 0 200 200">
                        <clipPath id="clipCircle">
                            <circle cx="100" cy="80" r="75" />
                        </clipPath>
                        <circle cx="100" cy="81" r="75" fill="none" stroke="grey" stroke-width="3" />
                        <image xlink:href="https://www.pngall.com/wp-content/uploads/5/Profile-PNG-Pic.png" width="200"
                            height="200" clip-path="url(#clipCircle)" y="-20" />
                    </svg>
                </div>
                <div style="text-align: center;" v-else>
                    <img class="" style="height: 33vh; width: 33vh;" :src=item.img alt="imagem não encontrada">
                </div>
                <table v-if="textBox">
                    <tr v-for="(label, field) in fields" :key="field">
                        <th v-if="field != 'img'">{{ label }}:</th>
                        <td v-if="field != 'img'">{{ item[field] }}</td>
                    </tr>
                </table>
            </div>
            <slot name="actions" :item="item"></slot>
        </div>
    </div>
</template>


<script>
export default {
    props: {
        items: {
            type: Array,
            required: true
        },
        textBox: {
            type: Boolean,
            required: true
        },
        fields: {
            type: Object,
            required: true
        }
    }
};
</script>

<style scoped>
.card-body {
    height: 100%;
    padding: 0;
    padding-top: 10px;
}

table {
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
    background-color: #E7E7E7;
    display: grid;
}

.tablet {
    text-align: start;
    margin-top: 0;
    height: 100%;
}

tr {
    display: grid;
    padding-left: 5px;
}

th {
    color: rgb(71, 71, 71);
}

td {
    color: rgb(131, 130, 130);
}
</style>