import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from './components/pages/Home'
import Dashboard from './components/pages/Dashboard'
import Login from './components/pages/Login'
import Register from './components/pages/Register'
import { isAuthenticated } from './auth'

Vue.use(VueRouter)

const routes = [
  { path: '/', component: Home },
  {
    path: '/app',
    component: Dashboard,
    beforeEnter: (to, from, next) => {
      if (!isAuthenticated()) next('/login')
      else next()
    },
  },
  {
    path: '/login',
    component: Login,
    beforeEnter: (to, from, next) => {
      if (isAuthenticated()) next('/app')
      else next()
    },
  },
  {
    path: '/register',
    component: Register,
    beforeEnter: (to, from, next) => {
      if (isAuthenticated()) next('/app')
      else next()
    },
  },
]
export default new VueRouter({
  mode: 'history',
  routes,
})
