<template>
    <div>
        <button @click="confirmDelete(item)" class="d-flex flex-wrap btn btn-link p-0">
            <i class="bi bi-trash" style="font-size: 2rem; color: red"></i>
        </button>
    </div>
</template>
<script>
import axios from 'axios';
export default{
    props: {
        item: Object,
        url: String,
    },
    methods: {
        confirmDelete(object) {
            if (confirm(`Você tem certeza que deseja excluir o produto ${object.nome}?`)) {
                this.deleteProduto(object.id);
            }
        },
    deleteProduto(id) {
            axios.delete(this.url + id)
                .then(response => {
                    this.$router.push({ name: 'homeProdutos' });
                })
                .catch(error => {
                    console.error('Erro ao excluir produto: ', error);
                    alert('Ocorreu um erro ao tentar excluir' + item[label]);
                });
        }
    },
}
</script>