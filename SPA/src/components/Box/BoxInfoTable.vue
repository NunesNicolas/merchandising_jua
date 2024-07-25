<template>
    <div class="container"
        style="width: 48%; height:50vh; background:#ffffff; border-radius:10px; border:darkgray solid 1.2px; text-align:left;">
        <ul class="list" style="list-style-type:none; padding:5px">
            <li class="list-item d-flex" style="justify-content: space-between">
                <p style="text-align:initial"> {{ title }}: </p>
                <slot name="tableactions" :table="table"></slot>
            </li>
            <div v-for="item in items" :key="item.id" class="d-flex">
                <div class="d-flex flex-wrap content-normal ml-4" id="infos" style="">
                    <table style="width: 100%;">
                        <thead>
                            <tr class="indicadores" style="">
                                <th v-for="(label, field) in fields" :key="field">{{ label }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td v-for="(label, field) in fields" :key="field">{{ item[field] }}</td>
                                <slot name="itemactions" :item="item"></slot>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </ul>
    </div>
</template>

<script>
export default {
    name: 'BoxTable',
    props: {
        title: {
            type: String,
            required: true,
        },
        items: {
            type: Array,
            required: true
        },
        table: {
            type: Object,
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
#infos {
    font-size: 1.6vh;
    justify-content: center;
    align-items: center;
    text-decoration: none;
    color: #858585;
    width: 95%;
    height: 10vh;
    margin-top: 1vh;
    border-radius: 0.5vh;
    align-items: center;
    justify-content: space-evenly;
}

.indicadores {
    font-size: 2.0vh;
    color: rgb(59, 59, 59);
}

</style>
