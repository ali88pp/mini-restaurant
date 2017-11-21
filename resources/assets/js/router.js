import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
    { path: '/', component: () => import('./pages/Dashboard.vue') },
    { path: '/user', component: () => import('./pages/User.vue') },
]
const router = new VueRouter({
    mode: 'history',
    routes
})

export default router