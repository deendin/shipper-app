import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import AboutView from '../views/AboutView.vue'
import ShipperCreateView from '../views/ShipperCreateView.vue'
import ContactView from '../views/ContactView.vue'
import ShipperUpdateView from '../views/ShipperUpdateView.vue'

const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/about',
      name: 'about',
      component: AboutView,
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      // component: () => import('../views/AboutView.vue')
    },
    {
      path: '/shipper/create',
      name: 'shipper',
      component: ShipperCreateView
    },
    {
      path: '/shipper/:id/contacts',
      name: 'create-shipper',
      component: ContactView
    },
    {
      path: '/shipper/:id/update',
      name: 'update-shipper',
      component: ShipperUpdateView
    }
  ]
})

export default router
