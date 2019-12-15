import './bootstrap'
import Vue from 'vue'
import Vuetify from 'vuetify/lib'
import store from './store'
import router from './router'
import App from './components/App.vue'

const opts = {
  iconfont: 'mdiSvg',
  theme: {
    dark: false,
    themes: {
      light: {
        primary: '#DE4E51',
        secondary: '#b0bec5',
        accent: '#8c9eff',
        error: '#b71c1c',
      },
    },
  },
}
const vuetify = new Vuetify(opts)

Vue.use(Vuetify)


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('App', require('./components/App.vue').default)

new Vue({
  vuetify,
  router,
  store,
  el: '#app',
  render: (h) => h(App),
})
