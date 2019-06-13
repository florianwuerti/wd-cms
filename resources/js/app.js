require('./bootstrap');
require('./manage');

import Vue from 'vue';
import Buefy from 'buefy';
import changeUserPassword from './components/changeUserPassword.vue';


Vue.component('changeuserpassword', changeUserPassword);

Vue.use(Buefy);


new Vue({
    el: '#app',
    data: {
        auto_password: true,
        password_options: 'keep',

    },
    methods: {}


});