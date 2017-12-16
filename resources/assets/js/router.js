import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
    { path: '/', component: () => import('./pages/Dashboard.vue') },
    { path: '/user', component: () => import('./pages/User.vue') },
    { path: '/permission', component: () => import('./pages/Permission.vue') },
    { path: '/role', component: () => import('./pages/Role.vue') },
    { path: '/category', component: () => import('./pages/Category.vue') },
    { path: '/food', component: () => import('./pages/Food.vue') },
    { path: '/beverage', component: () => import('./pages/Beverage.vue') },
    { path: '/order', component: () => import('./pages/order/index.vue') },
    { path: '/order/new', component: () => import('./pages/order/new.vue') },
]
const router = new VueRouter({
    mode: 'history',
    routes
})

export default router