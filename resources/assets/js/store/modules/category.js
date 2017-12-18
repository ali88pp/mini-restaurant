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
    }
}

const actions = {
    fetchData ({ commit }, params) {
        http.get('api/category')
        .then( response => {
            commit('RECEIVE_DATA',  response.data)
        })
    },

    async add({ commit }, params) {
        let response = await http.post('api/category/create', params)        
        commit('ADD_NEW',  response.data)
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