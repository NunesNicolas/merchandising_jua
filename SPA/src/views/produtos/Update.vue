<template>
    <ProdutoForm :title="'Atualizar Produto'" :values="values" :submitLabel="'Atualizar Produto'"
        :onSave="updateProduto" />
</template>

<script>
import axios from 'axios';
import ProdutoForm from './Form.vue';

export default {
    name: 'Update',
    components: {
        ProdutoForm
    },
    data() {
        return {
            values: {
                nome: '',
                weights: []
            },
            variants: [],
        };
    },
    created() {
        this.fetchProdutoData();
    },
    methods: {
        async fetchProdutoData() {
            try {
                const response = await axios.get(`/produtos/${this.$route.params.id}`);
                this.values = response.data.produto;
                this.variants = response.data.produtovariants;
                this.values.weights = []
                for (let i = 0; i < this.variants.length; i++) {
                    this.values.weights.push(this.variants[i].weight)
                    
                }
            } catch (error) {
                console.error('Error fetching produto data:', error);
            }
        },
        async updateProduto(formData) {
            try {
                const response = await axios.put(`/produtos/${this.$route.params.id}`, formData);
                alert(formData.weights);

                if (response.status === 200) {
                    alert(response.statusText);
                    this.$router.push('/produtos');
                }
            } catch (error) {
                console.error('Error updating produto:', error);
            }
        }
    }
};
</script>