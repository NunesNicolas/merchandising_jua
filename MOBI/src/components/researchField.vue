<template>
    <div id="separator" class="animate-fade-up">
        <label>{{ item[label] }} {{ item[label2] }}</label>
        <input class="desc" type="text" :id="item.id" name="description" :placeholder="placeholder(item[label3])"
            @input="updateValue" :disabled="isDisabled" :value="modelValue.price" />
        <p>Não Consta</p>
        <input type="checkbox" id="check" name="Check" @change="toggleDisabled" />
    </div>
</template>

<script>
export default {
    props: {
        clienteid: {
            type: Number,
            required: true
        },
        item: {
            type: Object,
            required: true
        },
        label: {
            type: String,
            required: true
        },
        label2: {
            type: String,
            required: true
        },

        label3: {
            type: String,
            required: true
        },

        product_or_competitor: {
            type: String,
            required: true
        },
        excluirModelValue: Function,
        preencher: Function,


    },
    data() {
        return {
            modelValue: {
                price: '',
                promotor_route_id: '',
                product_id: '',
            },
            isDisabled: false
        }
    },
    methods: {

        placeholder(valor) {
            if (valor) {
                const result = 'último valor cadastrado: ' + 'R$' + valor.toFixed(2);
                return result
            } else {
                return 'sem valor cadastrado'
            }

        },
        updateValue(event) {
            if (this.product_or_competitor == 'product') {


                this.modelValue.price = event.target.value;
                this.modelValue.cliente_id = this.clienteid;
                this.modelValue.promotor_route_id = this.$route.params.pesquisaid;
                this.modelValue.product_id = this.item.id;
                this.$emit('preencher', this.modelValue);
            }else if(this.product_or_competitor == 'competitor'){
                this.modelValue.price = event.target.value;
                this.modelValue.cliente_id = this.clienteid;
                this.modelValue.promotor_route_id = this.$route.params.pesquisaid;
                this.modelValue.competitor_id = this.item.id;
                this.$emit('preencher', this.modelValue);
            }
        },
        toggleDisabled(event) {
            this.isDisabled = event.target.checked;
            if (this.isDisabled) {
                this.modelValue.price = '';
                this.$emit('excluirModelValue', this.modelValue);
            }
        }
    }
}
</script>
<style>
#separator {
    display: flex;
    flex-wrap: wrap;
    justify-content: end;
    align-items: center;
    width: 80vw;
    height: 12vh;
    margin-inline: 10vw;
    margin-top: 3vh;
    animation-name: animationStart;
    animation-duration: 1s;
}

@keyframes animationStart {
    0% {
        width: 0vw;
    }

    ;

    100% {
        width: 80vw;
    }
}

#separator label {
    text-align: start;
    width: 100%;
    height: 3vh;
    color: #b0b0b0;
    font-weight: bold;
    font-size: 2.5vh;

}

#separator input {
    background-color: #D9D9D9;
    color: black;
    border: none;
}

.desc {
    width: 100%;
    height: 5vh;
    border-radius: 1vh;
    padding-inline-start: 2vw;
    box-shadow: 0vh 0.2vh 0.3vh 0vh;

}

#check {
    width: 5vw;
    margin: 0;
    height: 5vh;
}

#separator p {
    width: 23vw;
    margin-top: 1.5vh;
    color: #b0b0b0;
}
</style>