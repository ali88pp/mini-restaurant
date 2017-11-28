import Vue from 'vue'
import Vuex from 'vuex'
import user from './modules/user'
import permission from './modules/permission'
import role from './modules/role'

Vue.use(Vuex)

const store = new Vuex.Store({
    modules: {
        user,
        permission,
        role,
    }
})

export default store