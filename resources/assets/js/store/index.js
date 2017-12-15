import Vue from 'vue'
import Vuex from 'vuex'
import user from './modules/user'
import permission from './modules/permission'
import role from './modules/role'
import category from './modules/category'
import food from './modules/food'
import beverage from './modules/beverage'

Vue.use(Vuex)

const store = new Vuex.Store({
    modules: {
        user,
        permission,
        role,
        category,
        food,
        beverage,
    }
})

export default store