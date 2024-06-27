<script setup>
import axios from "axios";
</script>

<template>



    <div class="container mt-4 ml-4 mr-5" style="text-align: justify;">
        <h2>Novo Produto
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                class="bi bi-person-fill-add" viewBox="0 0 16 16">
                <path
                    d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                <path
                    d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4" />
            </svg>
        </h2>

        <hr>

        <div class="alert alert-danger mt-4" v-if="errors.length">
            <ul class="mb-0">
                <li v-for="(error, index) in errors" :key="index">
                    {{ error }}
                </li>
            </ul>
        </div>

        <form action=" " method="POST" @submit.prevent="saveProduto" novalidate>
            <input type="hidden" name="_token" value="VMMuhrZ1JiFYSZxORQlfaH5jwjfrmWlCsGfp98K2" autocomplete="off">
            <div class="form-group">
                <label for="nomeproduto">Nome do Produto:</label>
                <input type="text" class="form-control" name="nome" v-model="produto.nome" placeholder="Digite um Nome">
            </div>

            <br>

            <div class="form-group">
                <label for="precoproduto">Adicione o link da imagem do seu produto:</label>
                <input type="text" class="form-control" name="img" v-model="produto.img" placeholder="Digite um Preço">
            </div>

            <br>

            <div class="d-flex">
                <input type="checkbox" id="unit-switch" v-model="checked">
                <h5 id="unit-text" :style="{ marginTop: '-0.9vh', marginLeft: '1.5vh' }">
                    {{ checked ? 'por Litro' : 'por Kg' }}</h5>
            </div>

            <br>

            <table class="">
                <div class="form-check">
                    <input id="weight500" name="weight500" value="500" class="form-check-input" type="checkbox"
                        @change="updateWeights(500, $event)">
                    <label id="unit-weight0,5" class="form-check-label">
                        {{ checked ? '500ml' : '500g' }}
                    </label>
                </div>

                <div class="form-check">
                    <input id="weight1000" name="weight1000" value="1000" class="form-check-input" type="checkbox"
                        @change="updateWeights(1000, $event)">
                    <label id="unit-weight1" class="form-check-label">
                        {{ checked ? '1L' : '1Kg' }}
                    </label>
                </div>

                <div class="form-check">
                    <input id="weight5000" name="weight5000" value="5000" class="form-check-input" type="checkbox"
                        @change="updateWeights(5000, $event)">
                    <label id="unit-weight5" class="form-check-label">
                        {{ checked ? '2L' : '2Kg' }}
                    </label>
                </div>

            </table>
            <br>
            <button type="submit" class="btn btn-primary">Criar Produto</button>
        </form>
    </div>
</template>

<script>
export default {
    name: 'createProdutos',
    data() {
        return {
            produto: {
                nome: '',
                img: '',
                weights: []
            },
            errors: [],
            checked: true
        }
    },
    methods: {
        async saveProduto() {
            this.errors = [];
            if (!this.produto.nome) {
                this.errors.push("Um nome é necessário")
            }

            if (!this.produto.img) {
                this.errors.push("Uma imagem é necessária")
            }

            if (this.produto.weights.length === 0) {
                this.errors.push("Um peso é necessário")
            }

            if (!this.errors.length) {
                let formData = new FormData();
                formData.append('nome', this.produto.nome);
                formData.append('img', this.produto.img);
                this.produto.weights.forEach((weight, index) => {
                    formData.append(`weights[${index}]`, weight);
                });
                let url = '/produtos/save_produto';
                await axios.post(url, formData).then((response) => {
                    console.log(response);
                    if (response.status == 200) {
                        alert(response.data.message);
                    }
                    this.$router.go(-1);
                });
            }

        },
        updateWeights(weight, event) {
            if (event.target.checked) {
                this.produto.weights.push(weight);
            } else {
                const index = this.produto.weights.indexOf(weight);
                if (index > -1) {
                    this.produto.weights.splice(index, 1);
                }
            }
        }
    }
}
</script>
