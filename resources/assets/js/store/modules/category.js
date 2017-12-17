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
}

const actions = {
    fetchData ({ commit }, params) {
        http.get('api/category')
        .then( response => {
            commit('RECEIVE_DATA',  response.data);
        })
    }
}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}