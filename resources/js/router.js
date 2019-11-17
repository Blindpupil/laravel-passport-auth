import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from './components/pages/Home'
import Dashboard from './components/pages/Dashboard'
import Login from './components/pages/Login'
import Register from './components/pages/Register'

Vue.use(VueRouter)

const isUserAuthed = false

const routes = [
    { path: '/', component: Home },
    {
        path: '/app',
        component: Dashboard,
        beforeEnter: (to, from, next) => {
            if (!isUserAuthed) next('/login')
            else next()
        },
    },
    {
        path: '/login',
        component: Login,
        beforeEnter: (to, from, next) => {
            if (isUserAuthed) next('/app')
            else next()
        },
    },
    {
        path: '/register',
        component: Register,
        beforeEnter: (to, from, next) => {
            if (isUserAuthed) next('/app')
            else next()
        },
    },
]
export default new VueRouter({
    mode: 'history',
    routes,
})
