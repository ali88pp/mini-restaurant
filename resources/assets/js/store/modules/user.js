import http from './../../http'

const state = {
    items: []
}

const getters = {
}

const mutations = {
    RECEIVE_DATA (state, items) {
        state.items.splice(0, state.items.length)
        items.forEach(u => {
            state.items.push(u);
        }); 
    },
}

const actions = {
    fetchData ({ commit }, params) {
        http.post('user')
        .then( response => {
            commit('RECEIVE_DATA',  response.data.data);
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