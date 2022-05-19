
import Vue from 'vue';

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
import App from '../js/views/App.vue';
Vue.use(VueAxios, axios);

const router = new VueRouter({ mode: 'history'});
new Vue(Vue.util.extend({ router }, App)).$mount('#app');