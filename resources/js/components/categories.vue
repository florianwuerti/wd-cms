<template>
    <div class="field">
        <input type="hidden" name="roles" :value="category"/>
        <b-checkbox v-model="category" :native-value="categories.id">{{categories.name}}</b-checkbox>
    </div>
</template>

<script>
    export default {
        name: "categories",
        props: ['value'],

        data() {
            return {
                category: '',
                categories: this.value,
                rolesSelected: this.value


            }
        },

        methods: {},

    }
</script>

<style scoped>

</style>