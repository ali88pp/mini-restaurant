require('./bootstrap');

import Vue from 'vue'
import Vuetify from 'vuetify'
import App from './components/App.vue'
import router from './router'

Vue.use(Vuetify)

const app = new Vue({
    el: '#el',

    router,

    components: { App }
});
