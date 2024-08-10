<template>
    <div v-if="!item" style="width: 100%;">
        <h3>Não há dados disponíveis.</h3>
    </div>

        <div v-else class="card">            
            <div class="card-body">
                <slot name="topactions" :item="item">
                </slot>
                <div v-if="!item.img">
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
                    <svg v-if="thisuser" viewBox="0 0 200 200">
                        <clipPath id="clipCircle">
                            <circle cx="100" cy="80" r="75" />
                        </clipPath>
                        <circle cx="100" cy="81" r="75" fill="none" stroke="grey" stroke-width="3" />
                        <image :xlink:href=item.img width="200"
                            height="200" clip-path="url(#clipCircle)" y="-20" />
                    </svg>
            
                     <img  v-else class="" style="height: 80%; width: 100%; margin-top: auto; margin-bottom: 0px;" :src=item.img alt="imagem não encontrada" />
                      
                </div>
                <table v-if="textBox" class="mb-0" style="margin-top: auto;">
                    <tr v-for="(label, field) in fields" :key="field">
                      <th v-if="field != 'img'">{{ label }}:</th>
                      <td v-if="field != 'img'">{{ item[field] }}</td>
                    </tr>
                  </table>
            </div>
            <slot name="actions" :item="item"></slot>
        </div>
</template>


<script>
export default {
    props: {
        item: {
            type: Object,
            required: true
        },
        textBox: {
            type: Boolean,
            required: true
        },
        fields: {
            type: Object,
            required: true
        },
        thisuser: {
            type: Boolean,
        }
    }
};
</script>

<style scoped>
.card{
    width: 100%;
}
.card-body {
    width: 100%;
    height: 100%;
    padding: 0;
    padding-top: 10px;
}

table {
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
    font-size: 2vh;
    display: grid;
    width: 100%;
    margin-top: auto;
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