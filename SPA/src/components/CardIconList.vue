<template>
    <div v-for="item in items" :key="item.id" class="card-container"
        style="display: flex; text-align: center; flex-wrap: wrap;">
        <div class="card"
            style="justify-content: center; border-radius: 10px; width: 235px; display: flex; text-align: left; margin: 10px;">
            <div class="card-body" style="height: 35vh;">
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
                <div v-else>
                    <img class="" style="height: 33vh; width: 33vh;" :src=item.img alt="imagem não encontrada" >
                </div>
            </div>
            <div class="contentTable">
                <thead class="tablet">
                    <tr class="indicadores">
                        <th v-for="(label, field) in fields" :key="field">{{ label }}: </th>
                    </tr>
                </thead>
                <tbody class="tablet">
                    <tr>
                        <td v-for="(label, field) in fields" :key="field">{{ item[field] }}</td>
                    </tr>
                </tbody>
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
.contentTable {
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
    background-color: rgb(187, 187, 187);
    display: flex;
    width: 100%;
}
.tablet{
    width: 100%;
    text-align: center;
    margin-top: 0;
}
tr {
    width: 100%;
    display: grid;
}
</style>