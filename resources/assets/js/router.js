import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
    { path: '/', component: require('./components/Home') },
]
const router = new VueRouter({
    routes
})

export default router