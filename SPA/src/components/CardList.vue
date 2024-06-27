<template>
    <div>
        <div v-if="items.length === 0" class="no-data-message">
            <div class="d-flex flex-wrap content-normal bg-light ml-4" id="infos" style="">
                <table style="width: 80%;">
                    <p>Não há dados disponíveis.</p>
                </table>
            </div>
        </div>
        <div v-else>
            <div v-for="item in items" :key="item.id" class="d-flex">
                <div class="d-flex flex-wrap content-normal bg-light ml-4" id="infos" style="">
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
                    <router-link :to="'empresas/' + item.id" class="d-flex flex-wrap">Ver atividade
                        <svg xmlns="http://www.w3.org/2000/svg" style="width: 2vw; height: 4vh;" fill="currentColor"
                            class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                            <path
                                d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5" />
                            <path
                                d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                        </svg>
                    </router-link>
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
    },
    methods: {
        formatarData(data) {
            // Implemente a lógica de formatação de data conforme necessário
            return data ? new Date(data).toLocaleDateString() : '';
        }
    }
};
</script>

<style scoped>
/* Estilos opcionais para personalização */
#infos {
    font-size: 2.2vh;
    justify-content: center;
    align-items: center;
    text-decoration: none;
    color: #858585;
    width: 95%;
    height: 8vh;
    border-left: solid 0.3vw #2C9AFF;
    margin-top: 3vh;
    border-radius: 0.5vh;
    align-items: center;
    justify-content: space-evenly;
    box-shadow: 0vh 0.1vh 0.3vh 0vh #858585;
}

.indicadores {
    color: black;
}
</style>
