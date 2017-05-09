import Home from '../components/frontend/default/home-page/index.vue';
import Register from '../components/frontend/default/auth/register/index.vue';
import Login from '../components/frontend/default/auth/login/index.vue';
import Collage from '../components/frontend/default/collage/index.vue';

// Defining routes
const access_token = localStorage.getItem('token');
const routes = [
  {
    path: '/',
    component: Home,
    beforeEnter(to, from, next) {
      if (!access_token) {
        next('/login')
      } else {
        next()
      }
    },
  },
  {
    path: '/collage',
    component: Collage,
    beforeEnter(to, from, next) {
      if (!access_token) {
        next('/login')
      } else {
        next()
      }
    },
  },
  {
    path: '/register',
    component: Register,
    beforeEnter(to, from, next) {
      if (access_token) {
        next(from)
      } else {
        next()
      }
    },
  },
  {
    path: '/login',
    component: Login,
    beforeEnter(to, from, next) {
      if (access_token) {
        next(from)
      } else {
        next()
      }
    },
  },
]

export default routes