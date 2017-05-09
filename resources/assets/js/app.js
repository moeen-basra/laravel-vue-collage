/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VeeValidate from 'vee-validate'

Vue.use(VeeValidate);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import LayoutComponent from './components/frontend/default/layout.vue'
import router from './router'
import store from './store'

const app = new Vue({
  el: '#app',
  router,
  store,
  components: {
    'layout-component': LayoutComponent,
  },
  methods: {
    fetchUser(access_token) {
      const config = {
        headers: {'Authorization': "Bearer " + access_token}
      };

      axios.get('/api/user', config)
        .then(response => {
          const { status, data } = response;
          if (status === 200) {
            this.processData({ access_token, user: data });
          }
        })
        .catch(error => {
          const { status, data } = error.response;
          if (status === 401) {
            localStorage.clear()
          } else {
            // TODO: handle errors
            console.log('app.js unhandled error')
          }
        })
    },
    processData({ access_token, user }) {
      this.dispatchUserAndToken({ access_token, user });
    },

    dispatchUserAndToken({ access_token, user }) {
      this.$store.dispatch('setUserAndAccessToken', { access_token, user })
    },
  },
  beforeMount() {
    const access_token = localStorage.getItem('token');
    if (access_token) {
      this.fetchUser(access_token)
    }
  }
});
