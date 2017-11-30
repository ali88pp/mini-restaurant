import Vue from 'vue'
import Vuex from 'vuex'
import user from './modules/user'
import permission from './modules/permission'
import role from './modules/role'
import food from './modules/food'

Vue.use(Vuex)

const store = new Vuex.Store({
    modules: {
        user,
        permission,
        role,
        food,
    }
})

export default store