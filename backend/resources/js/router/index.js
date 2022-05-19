import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/HomeView.vue'
import CategoryView from '../views/CategoryView.vue'
import AdminPanel from '../views/AdminPanel.vue'
import Cart from '../views/Cart.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },{
    path: '/cart',
    name: 'Cart',
    component: Cart
  },{
    path: '/category/:id',
    name: 'Category',
    component: CategoryView
  },{
    path: '/admin',
    name: 'Admin Panel',
    component: AdminPanel
  }
]

const router = new VueRouter({
  routes
})

export default router
