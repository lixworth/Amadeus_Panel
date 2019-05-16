import Vue from 'vue'
import './plugins/vuetify'
import App from './App.vue'
import router from './router'
import store from './store'
import './registerServiceWorker'
import i18n from './i18n'
import {Amadeus} from "./Amadeus";
// Require dependencies
var VueCookie = require('vue-cookie');
// Tell Vue to use the plugin
Vue.use(VueCookie);

Vue.config.productionTip = false

Amadeus.getinfo();
new Vue({
  router,
  store,
  i18n,
  render: h => h(App)
}).$mount('#app')
