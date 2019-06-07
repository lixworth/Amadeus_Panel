import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home.vue'
import Login from "./views/Login";
import LaserLayout from "./layouts/LaserLayout";
import VueCookie from 'vue-cookie';
import {Amadeus} from "./Amadeus";
import {isNull} from "vue-i18n";
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

function auth(){
  var token = VueCookie.get('Amadeus_token');
  if(token == null || token === "" || typeof(token) == "undefined" || token === false || token === undefined){
    return false;
  }else{
    return true;
  }
};
router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    if (auth) {
      next()
    } else {
      next({
        path: '/login',
        query: { redirect: to.fullPath }
      })
    }
  } else {
    next() // 确保一定要调用 next()
  }
});

export default router;