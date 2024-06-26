<script setup>
import axios from "axios";
</script>

<template>

    <div class="page">
    
    <div class="conteiner mt-4  ml-5 mr-5 " style="text-align: justify;">
        <h1>Novo Cliente
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

            <form method="POST" @submit.prevent="saveEmpresa" novalidate>
            <input type="hidden" name="_token" value="cgr3ItMlDgvqpEnKYPY9aBZe2ipUT7grzJG1UV54" autocomplete="off">                <div class ="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class ="form-control " name="nome" v-model="empresa.nome" placeholder="digite um Nome">
                </div>
                              
                <br>
                <div class ="form-group">
                    <label for="cnpj">CNPJ:</label>
                  <input type="text" class ="form-control " name="cnpj" v-model="empresa.cnpj" placeholder="digite um CNPJ">
                </div>

                <div class ="form-group">
                    <button type="submit" style="height: 8vh; margin-top: 3vh;" class="btn btn-primary">Criar Empresa</button>
                </div>

            </form>
  </div>
</div>

</template>

<script>

    export default {
        name: 'createEmpresas',
        data(){
            return{
                promotores: [],
                empresa: {
                    nome: '',
                    cnpj: '',
                  
                },
                errors: [],
            }
        },
        methods: {
        async saveEmpresa(){


            this.errors = [];
            if(!this.empresa.nome){
                this.errors.push("Nome is required");
            }
            if(!this.empresa.cnpj){
                this.errors.push("cnpj is required");
            }
            if (!this.errors.length) {
                let formData = new FormData();
                formData.append('nome', this.empresa.nome);
                formData.append('cnpj', this.empresa.cnpj);
                formData.append('promotor_id', this.$route.params.id);

                try {
                    const response = await axios.post('/empresas/save_empresa', formData);
                    console.log(response);
                    if (response.status === 200) {
                        alert(response.data.message);
                    }
                } catch (error) {
                    console.error('Error saving empresa:', error);
                        
                    };
            }
        }
    },
}

</script>