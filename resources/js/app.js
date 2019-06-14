require('./bootstrap');
require('./manage');

import Vue from 'vue';
import Buefy from 'buefy';
import changeUserPassword from './components/changeUserPassword.vue';
import imgUpload from './components/imgUpload.vue';


Vue.component('changeuserpassword', changeUserPassword);
Vue.component('imgupload', imgUpload);

Vue.use(Buefy);


new Vue({
    el: '#app',
    data: {
        auto_password: true,
        password_options: 'keep',

    },
    methods: {}


});