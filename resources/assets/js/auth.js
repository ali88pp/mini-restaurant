// require('./bootstrap');

import Vue from 'vue'
import Vuetify from 'vuetify'
import Login from './pages/login.vue'

Vue.use(Vuetify)
const auth = new Vue({
    el: '#auth',

    components: {
        Login
    }
})
