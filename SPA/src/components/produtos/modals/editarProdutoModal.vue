<script setup>
import axios from "axios";
</script>

<template>
  <div class="fade">
    <div class="editproduto">
      <b-modal
        centered
        id="modal-produto"
        ref="modal-edit"
        title="Editar Produto"
        hide-footer
      >
        <form @submit.prevent="update" novalidate>
          <div class="form-group">
            <label for="nomeproduto">Nome do Produto: </label>
            <input type="text" class="form-control" name="nome" v-model="produto.nome" placeholder="Digite um Nome">
          </div>

          <!-- <b-form-group label="Situação do Produto" label-for="situação-input"></b-form-group>
          <b-form-select class="mb-3" :options="options"></b-form-select> -->

          <div class="imgdiv">
            <img :src="produto.img" style="width: 11vw; height: 22vh;">
            <div class="form-group" style="width: 65%;">
              <label for="imgproduto">Upload de Imagens</label>
              <input type="text" class="form-control" name="img" v-model="produto.img" placeholder="Cole um link de uma imagem">
            </div>
          </div>

          <div class="form-group" style="text-align: center;">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>
      </b-modal>
    </div>
  </div>
</template>

<script>

export default {
  name: 'editarProdutoModal',
  data() {
    return {
      id: this.$route.params.id,
      produto: {
        nome: '',
        img: '',
        
      },
      errors: [],
      // options: [
      //   { value: null, text: 'Selecione a situação do produto' },
      //   { value: 'ativo', text: 'Ativo' },
      //   { value: 'nao_ativo', text: 'Não ativo' },
      //   { value: 'indisponivel', text: 'Indisponível', disabled: true }
      // ]
    };
  },
  created() {
    
  },
  methods: {
    async update() {
      try {

        let formData = new FormData();
        formData.append('nome', this.produto.nome);
        formData.append('img', this.produto.img);

        // let response = await axios.put('/produtos/' + this.id);

        let url = 'http://127.0.0.1:8000/api/produtos/';

        await axios.put(url + this.id, formData). then((response) => {
                        console.log(response);
                        if(response.status == 200) {
                            alert(response.data.message);
                        }
                    });
        // this.$bvModal.hide('modal-produto');

      } catch (error) {
        console.error(error);
        this.errors.push('Erro ao atualizar produto.');
      }
    }
//     async update() {
//   try {
//     // Monta o payload com os dados do produto
//     let payload = {
//       nome: this.produto.nome,
//       img: this.produto.img,
//     };

//     // Faz a requisição PUT para atualizar o produto
//     let response = await axios.put('/produtos/'+ this.id, payload);

//     // Exibe a mensagem de sucesso e esconde o modal
//     alert(response.data.message);
//     this.$bvModal.hide('modal-produto');
//   } catch (error) {
//     console.error(error);
//     this.errors.push('Erro ao atualizar produto.');
//   }
// }

  },
  props: {
    produto: Object
  },
  mounted() {
    
  }
};
</script>

<style scoped>
.fade {
  transition: opacity 0.5s;
}
.imgdiv {
  display: flex;
  gap: 10px;
}
</style>
