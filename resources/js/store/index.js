import Vue from 'vue'
import Vuex from 'vuex'
import api from '../api'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    isLoggedIn: false,
    user: null,
  },
  mutations: {
    setUser(state, user) {
      state.user = user
    },
    setIsLoggedIn(state, value) {
      state.isLoggedIn = value
    },
  },
  actions: {
    async login({ commit }, credentials) {
      const user = await api.login(credentials)
      if (user) {
        commit('setIsLoggedIn', true)
        commit('setUser', user)
      }
    },
    async logout({ commit }) {
      await api.logout()
      commit('setIsLoggedIn', false)
    },
  },
})
