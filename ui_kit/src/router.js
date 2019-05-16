import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home.vue'
import Login from "./views/Login";
import LaserLayout from "./layouts/LaserLayout";
Vue.use(Router);
var router = new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      component: LaserLayout,
      meta: { requiresAuth: true },
      children: [
        {
          path: 'home',
          name: 'home',
          component: () => import(/* webpackChunkName: "home" */ './views/Home.vue')
        }
      ]
    },
    {
      path: '/about',
      name: 'about',
      component: () => import(/* webpackChunkName: "about" */ './views/About.vue')
    },{
      path: '/login',
      name: 'login',
      component: () => import(/* webpackChunkName: "about" */ './views/Login.vue')
    },{
      path: '*',
      name: 'NotFound',
      component: () => import(/* webpackChunkName: "notfound" */ './views/NotFound.vue')
    }
  ]
});

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    var chxsb = true;
    if (chxsb) {
      next({
        path: '/login',
        query: { redirect: to.fullPath }
      })
    } else {
      next()
    }
  } else {
    next() // 确保一定要调用 next()
  }
});

export default router;