<script setup>
import axios from "axios";
</script>

<template>
    <div class="d-flex flex-wrap" style="width: 100%; padding: 3vh 3vw;">
        <h2 class="d-flex" style="width: 100%;">Cadastro de produto concorrente
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                class="bi bi-person-fill-add" viewBox="0 0 16 16">
                <path
                    d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                <path
                    d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4" />
            </svg>
        </h2>
        <form class=" d-flex flex-wrap" method="POST" style="
            width: 60%;
            height: 20vh;
        " @submit.prevent="saveCompetitor" novalidate>
            <label class="" style="margin-top: 6vh;" for="nomeproduto">Nome do Produto:</label>
            <input type="text" style="height: 6vh;" class="form-control" name="nome" v-model="competitors.nome"
                placeholder="Digite um Nome">
            <label class="" for="nomedamarca" style="margin-top: 3vh;">Nome da produtora</label>
            <input type="text" style="height: 6vh;" class="form-control" name="brand" v-model="competitors.brand"
                placeholder="Digite o nome da produtora ">
            <button type="submit" style="height: 8vh; margin-top: 3vh;" class="btn btn-primary">Criar Produto</button>
        </form>
    </div>
</template>

<script>
export default {
    name: 'Competitors',
    data() {
        return {
            competitors: {
                nome: '',
                brand: ''
            },
            errors: [],
            checked: true
        }
    },
    props: [
        'id'
    ],
    methods: {
        async saveCompetitor() {
            this.errors = [];
            if (!this.competitors.nome) {
                this.errors.push("Um nome é necessário");
            }

            if (!this.competitors.brand) {
                this.errors.push("Uma marca é necessária");
            }

            if (!this.errors.length) {
                let formData = new FormData();
                formData.append('nome', this.competitors.nome);
                formData.append('brand', this.competitors.brand);
                formData.append('product_id', this.$route.params.id);
                let url = '/competitors';
                try {
                    let response = await axios.post(url, formData);
                    console.log(response);
                    if (response.status === 200) {
                        alert(response.data.message);
                    }
                    this.$router.go(-1);
                } catch (error) {
                    console.error('Erro ao salvar competidor:', error);
                    // Trate o erro aqui conforme necessário
                }
            }
        }
    }
}
</script>
<style>
</style>