<template>
    <div class="container">
        <div v-for="(camp, field) in defaults" class="round">
            <input type="checkbox" :id="field" :value="camp[label]" :checked="checkin(camp[label])"
                @change="update(camp, field)" />
            <label :for="field" class="circle">
                {{ camp[label] }}
            </label>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        defaults: Object,
        options: Array,
        instance: Object,
        value: '',
        label: '',
    },
    data() {
        return {
            selectedOptions: [],
        };
    },
    created() {
        this.selectedOptions = this.options.map(option => option[this.label]);
    },
    methods: {
        checkin(object) {
            return this.options.some(option => object == option[this.label]);
        },

        update(camp, field) {
            const value = camp[this.label];
            const index = this.selectedOptions.findIndex(option => option === value);

            if (index === -1) {
                this.selectedOptions.push(value);
            } else {
                this.selectedOptions.splice(index, 1);
            }

            console.log(this.selectedOptions)
        },
    },
};
</script>

<style scoped>
.container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.round {
    display: flex;
    align-items: center;
}

input {
    height: 40px;
}

.selected {
    font-weight: bold;
    color: #666;
}
</style>