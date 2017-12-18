import http from './../../http'

const state = {
    items: []
}

const getters = {
}

const mutations = {
    RECEIVE_DATA (state, result) {
        state.items.splice(0, state.items.length)
        result.data.forEach(u => {
            state.items.push(u);
        }); 
    },

    ADD_NEW (state, { category }) {
        state.items.push(category)
    },
    
    DELETE (state, { category }) {
        let _category = state.items.filter(el => el.id == category.id )[0]
        state.items.splice(state.items.indexOf(_category), 1)
    }
}

const actions = {
    fetchData ({ commit }, params) {
        http.get('api/category')
        .then( response => {
            commit('RECEIVE_DATA',  response.data)
        })
    },

    async create({ commit }, params) {
        let response = await http.post('api/category/create', params)
        commit('ADD_NEW',  response.data)
        return response
    },
    
    async destroy({ commit }, category) {
        let response = await http.delete(`api/category/delete/${category.id}`)        
        commit('DELETE',  response.data)
        return response
    }
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}