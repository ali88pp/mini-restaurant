// require('./bootstrap');
import "babel-polyfill"
import Vue from 'vue'
import Vuetify from 'vuetify'
import Vuelidate from 'vuelidate'
import router from './router'
import store from './store'
import App from './components/App.vue'
import Login from './pages/login.vue'

Vue.use(Vuetify)
Vue.use(Vuelidate)

Vue.component('passport-clients', require('./components/passport/Clients.vue'))
Vue.component('passport-authorized-clients', require('./components/passport/AuthorizedClients.vue'))
Vue.component('passport-personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue'))

const app = new Vue({
    el: '#application',
    router,
    store,
    components: { 
        App,
        Login
    }
});
