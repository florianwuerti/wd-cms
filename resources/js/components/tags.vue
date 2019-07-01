<template>

    <div>

        <form @submit.prevent="addTag">
            <input type="text" v-model="tag" id="tagFild" class="form-control m-b-5" placeholder="Tag hier eingeben ..."
                   name="tag" v-validate="'required|min:2|tag_unique'" data-vv-validate-on="enter|blur">
            <p class="alert" v-if="errors.has('tag')">{{errors.first('tag')}}</p>
        </form>

        <div class="field is-grouped is-grouped-multiline" v-for="(tag, id) in tags" :key="tag">
            <div class="control">
                <div class="tags has-addons">
                    <a class="tag is-link">{{tag}}</a>
                    <a class="tag is-delete" v-on:click="removeTag(id)"></a>

                    <input type="hidden" name="tag[]" :value="tag">
                </div>
            </div>
        </div>

    </div>

</template>
<script>

    export default {
        name: "tags",
        props: ['value'],

        data() {
            return {
                tag: '',
                tags: this.value,
            }
        },

        methods: {

            addTag() {
                this.$validator.validateAll().then((result) => {

                    if (result) {
                        this.tags.push(this.tag);
                        this.tag = '';
                    }
                });
            },

            removeTag(id) {
                this.tags.splice(id, 1)
            }
        },

        created() {
            this.$validator.extend('tag_unique', {

                getMessage: () => 'Der Tag ist bereits vorhanden',

                validate: (value) => {
                    return !this.tags.includes(value);
                }

            });
        }

    }
</script>

<style scoped>



</style>