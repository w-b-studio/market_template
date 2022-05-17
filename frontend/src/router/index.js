import Vue from 'vue'
import VueRouter from 'vue-router'
import HomeView from '../views/HomeView.vue'
import CategoryView from '../views/CategoryView.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: HomeView
  },{
    path: '/:id',
    name: 'Category',
    component: CategoryView
  },
]

const router = new VueRouter({
  routes
})

export default router
