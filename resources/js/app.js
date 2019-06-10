require('./bootstrap');
require('./manage');


window.Vue = require('vue');
import Buefy from 'buefy';

Vue.use(Buefy);


const app = new Vue({
    el: '#app',
});
