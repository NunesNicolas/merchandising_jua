<template>
    <div class="tabelas">
        <div v-if="items.length === 0" class="no-data-message">
            <div class="infos ml-4" style="">
                <table style="width: 80%;">
                    <p>Não há dados disponíveis.</p>
                </table>
            </div>
        </div>
        <div v-else>
            <div v-for="item in items" :key="item.id" class="d-flex">
                <div class="infos ml-4" style="">
                    <table style="width: 80%;">
                        <thead>
                            <tr class="indicadores">
                                <th v-for="(label, field) in fields" :key="field">{{ label }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td v-for="(label, field) in fields" :key="field">{{ item[field] }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <slot name="actions" :item="item"></slot>
                </div>
            </div>
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
        fields: {
            type: Object,
            required: true
        }
    }
};

</script>

<style scoped>
/* Estilos opcionais para personalização */
.infos {
    display: flex;
    flex-wrap: wrap;
    font-size: 2.2vh;
    content: normal;
    justify-content: center;
    align-items: center;
    text-decoration: none;
    background-color: white;
    color: #858585;
    width: 95%;
    height: 8vh;
    border-left: solid 0.3vw #2C9AFF;
    margin-top: 3vh;
    border-radius: 0.5vh;
    justify-content: space-evenly;
    box-shadow: 0vh 0.1vh 0.3vh 0vh #858585;
}

.indicadores {
    color: black;
}
</style>
