<template>

    <div class="img-upload-wrapper">
        <div class="image-input" v-on:click="chooseImage">
            <span v-if="!imageData" class="placeholder">Set featured image</span>
            <input id="image" name="image" class="img-file-input" ref="fileInput" type="file"
                   v-on:input="onSelectFile">
        </div>
        <div class="img-input-data-wrapper notification" v-if="imageData">
            <button type="button" class="delete" @click="removeImage"></button>
            <img :src="imgSrc" class="img-input-data" alt=""/>
        </div>
        <button type="button" v-if="imageData" @click="chooseImage" class="button">Replace image</button>
    </div>

</template>

<script>

    export default {

        props: ['src'],

        mounted() {
            // Do something useful with the data in the template
            //console.log(this.src)
        },

        data: function () {

            return {
                imageData: this.src ? this.src : '',
            }

        },

        computed: {
            imgSrc() {
                return this.imageData
            }
        },

        methods: {

            chooseImage() {
                this.$refs.fileInput.click()
            },

            onSelectFile() {

                const input = this.$refs.fileInput;
                const files = input.files;

                if (files && files[0]) {

                    const reader = new FileReader;
                    reader.onload = e => {
                        this.imageData = e.target.result;

                    };

                    reader.readAsDataURL(files[0]);
                    this.$emit('input', files[0])
                }
            },

            removeImage() {
                this.imageData = '';
            },


        }

    }
</script>

<style scoped>
</style>
