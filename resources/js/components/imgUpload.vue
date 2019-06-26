<template>

    <div class="img-upload-wrapper">
        <div class="image-input" v-on:click="chooseImage">
            <span v-if="!imageData"
                  class="placeholder button is-info is-outlined is-fullwidth">Set featured image</span>
            <input id="image" name="image" class="img-file-input" ref="fileInput" type="file" v-on:input="onSelectFile">
        </div>
        <div class="img-input-data-wrapper notification" v-if="imageData">
            <button type="button" class="delete" @click="removeImage"></button>
            <img :src="imgSrc" class="img-input-data" alt="" @click="chooseImage"/>
        </div>
        <p v-if='imgSrc' class="has-text-weight-light is-size-7" id="set-post-thumbnail-desc">Click the image to edit or update</p>
        <button type="button" v-if="imageData" @click="chooseImage" class="button is-info is-outlined is-fullwidth">
            Replace image
        </button>
    </div>

</template>

<script>

    export default {

        props: ['src'],

        mounted() {
            // Do something useful with the data in the template
            // console.log(this.imgSrc)
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
