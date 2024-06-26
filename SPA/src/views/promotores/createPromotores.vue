<script setup>
import axios from "axios";
</script>

<template>

    <div class="page">
    
    <div class="conteiner mt-4  ml-5 mr-5 " style="text-align: justify;">
        <h1>Novo Promotor
        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
  <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
</svg></h1>
        <hr>

        <div class="alert alert-danger mt-4" v-if="errors.length">
            <ul class="mb-0">
                <li v-for="(error, index) in errors" :key="index">
                    {{ error }}
                </li>
            </ul>
        </div>

            <form action="http://127.0.0.1:8000/promotores" method="POST" @submit.prevent="savePromotor" novalidate>
            <input type="hidden" name="_token" value="cgr3ItMlDgvqpEnKYPY9aBZe2ipUT7grzJG1UV54" autocomplete="off">                <div class ="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class ="form-control " name="nome" v-model="promotor.nome" placeholder="digite um Nome">
                </div>
                              
                <br>
                <div class ="form-group">
                    <label for="email">Email:</label>
                  <input type="text" class ="form-control " name="email" v-model="promotor.email" placeholder="digite um Email">
                </div>
                                <br>
                <div class ="form-group">
                    <label for="senha">Senha:</label>
                    <input type="text" class ="form-control " name="senha" v-model="promotor.senha" placeholder="digite sua senha">
                </div>
                                <br>
                <div class ="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="text" class ="form-control " name="telefone" v-model="promotor.telefone" placeholder="digite um Telefone">
                </div>
                                <br>
                <div class ="form-group">
                    <input type="submit" nome="submit" class="btn btn-lg btn-primary" style="background-color: #2c9aff; border: none">
                </div>

            </form>
  </div>
</div>

</template>

<script>

    export default {
        name: 'createPromotores',
        data(){
            return{
                promotor: {
                    nome: '',
                    email: '',
                    senha: '',
                    telefone: ''    
                },
                errors: [],
            }
        },
        methods: {
        async savePromotor(){

            this.errors = [];
            if(!this.promotor.nome){
                this.errors.push("Nome is required")
            }
            if(!this.promotor.email){
                this.errors.push("Email is required")
            }
            if(!this.promotor.senha){
                this.errors.push("Senha is required")
            }
            if(!this.promotor.telefone){
                this.errors.push("Telefone is required")
            }
            if(!this.errors.length){
                let formData = new FormData();
                formData.append('nome', this.promotor.nome);
                formData.append('email', this.promotor.email);
                formData.append('senha', this.promotor.senha);
                formData.append('telefone', this.promotor.telefone);

                let url = 'http://127.0.0.1:8000/api/promotores/save_promotor';
                await axios.post(url, formData).then((response) => {
                    console.log(response);
                    if(response.status == 200){
                        alert(response.data.message);
                    }
                });
            }
        }
    }
    }

</script>