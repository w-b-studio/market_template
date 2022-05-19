
import Vue from 'vue';
import router from './router'

import VueAxios from 'vue-axios';
import axios from 'axios';
import App from '../js/views/App.vue';
Vue.use(VueAxios, axios);

new Vue(Vue.util.extend({ router }, App)).$mount('#app');