// require('./bootstrap');

import Vue from 'vue'
import Vuetify from 'vuetify'
import router from './router'
import store from './store'
import App from './components/App.vue'
import Login from './pages/login.vue'

Vue.use(Vuetify)

const app = new Vue({
    el: '#application',
    router,
    store,
    components: { 
        App,
        Login
    }
});
