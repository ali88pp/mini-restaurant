import http from './../../http'

const state = {
    // items: []
    data: null
}

const getters = {
}

const mutations = {
    RECEIVE_DATA (state, items) {
        // state.items.splice(0, state.items.length)
        // items.forEach(u => {
        //     state.items.push(u);
        // }); 
        state.data = items
    },
}

const actions = {
    fetchData ({ commit }, params) {
        http.get('api/user')
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