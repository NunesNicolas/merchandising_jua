<template>
    <table>
        <h5>{{ label }}</h5>

        <div class="form-check form-switch" v-for="item in items">
            <label class="form-check-label">
                <input :id="item" :name="item" :value="item" class="form-check-input" type="checkbox"
                    @change="updateObjects(item, $event)">
                {{ item }}
            </label>
        </div>
    </table>
</template>

<script>
export default {
    name: 'CheckBox',
    data() {
        return {
            objects: []
        }
    },
    props: {
        label: String,
        modelValue: Array,
        items: Array
    },
    methods: {
        updateObjects(object, event) {
            if (event.target.checked) {
                this.objects.push(object);
            } else {
                this.objects = this.objects.filter(item => item !== object);
            }
            this.$emit('update:modelValue', this.objects);
        }
    }
}
</script>

<style scoped>
.form-check {
    display: flex;
    flex-wrap: wrap;
    margin-left: 10px;
    display: flex;
    width: 8vw;
}

table {
    margin-bottom: 2vh;
    width: 10%;
    display: flex;
    flex-wrap: wrap;
}
</style>