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
            
                     <img  v-else class="" style="height: 80%; width: 90%; margin-top: auto; margin-bottom: 0px; border-radius: 3vh;" :src=item.img alt="imagem não encontrada" />
                      
                </div>
                <table v-if="textBox" class="tablet" style="margin-top: auto;">
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
    width: 18vw;
    justify-content: center;
    border-radius: 2vh;
}
.card-body {
    height: 100%;
    padding: 0;
    padding-top: 10px;
}

.tablet {
    border-radius: 3vh;
    font-size: 2.5vh;
    display: grid;
    align-items: center;
    justify-content: center;
}

.tablet tr {
    display: grid;
    flex-wrap: wrap;
    justify-content: center;
}

.tablet th {
    color: rgb(71, 71, 71);
}

.tablet td {
    color: rgb(131, 130, 130);
}
</style>