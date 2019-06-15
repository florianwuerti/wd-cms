<template>

    <div>
        <div class="field is-horizontal m-t-20" v-if="!isHidden">
            <button v-on:click="isHidden = true" type="button" class="button is-info">Generate Password
            </button>
        </div>

        <div class="field has-addons has-addons-left m-t-20" v-if="isHidden">

            <div class="is-button-style">
                <p class="control">
                    <span class="input-group-addon"><i class="fas fa-lock"></i></span>
                </p>
            </div>
            <p class="control">
                <input class="input" :type="passwordFieldType" name="new_password" id="new_password"
                       :placeholder="placeholder" v-model="password">
            </p>


            <p class="control">
                <button type="button" class="button is-info" v-on:click="generate()">
                    <i class="fas fa-sync"></i>
                </button>
            </p>

            <button v-on:click="showPassword" type="button" class="button m-l-5"><i
                    class="fas fa-eye-slash m-r-5"></i>Hide
            </button>

            <button v-on:click="switchVisibility" type="button" class="button m-l-5">Cancel</button>

        </div>
    </div>
</template>

<script>
    export default {
        props: {
            size: {
                type: String,
                default: '10'
            },
            characters: {
                type: String,
                default: 'a-z,A-Z,0-9,#'
            },
            placeholder: {
                type: String,
                default: 'New Password'
            },

            auto: [String, Boolean],
            //value: ''
        },

        data: function () {

            return {
                isHidden: false,
                password: this.value,
                passwordFieldType: 'text',

            }

        },

        mounted: function () {
            if (this.auto === 'true' || this.auto === 1) {
                this.generate();
            }
        },

        methods: {

            generate() {
                let charactersArray = this.characters.split(',');

                let CharacterSet = '';

                let password = '';

                if (charactersArray.indexOf('a-z') >= 0) {
                    CharacterSet += 'abcdefghijklmnopqrstuvwxyz';
                }
                if (charactersArray.indexOf('A-Z') >= 0) {
                    CharacterSet += 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                }
                if (charactersArray.indexOf('0-9') >= 0) {
                    CharacterSet += '0123456789';
                }
                if (charactersArray.indexOf('#') >= 0) {
                    CharacterSet += '![]{}()%&*$#^<>~@|';
                }

                for (let i = 0; i < this.size; i++) {
                    password += CharacterSet.charAt(Math.floor(Math.random() * CharacterSet.length));
                }

                this.password = password;
            },
            showPassword() {

                this.passwordFieldType = this.passwordFieldType === 'text' ? 'password' : 'text';
            },
            switchVisibility() {

                this.password = '';
                this.isHidden = false;

            },

        }

    }
</script>
