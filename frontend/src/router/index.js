import Vue from 'vue'
import VueRouter from 'vue-router'
import SiteLayout from "../layout/SiteLayout";

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Default',
    redirect: '/site'
  },
  {
    path: '/site',
    name: 'site',
    component: SiteLayout,
    redirect: 'site/authors',
    children: [
      {
        path: 'authors',
        name: 'authors',
        component: () => import('../views/Authors.vue')
      },
      {
        path: 'books',
        name: 'books',
        component: () => import('../views/Books.vue')
      },
    ]
    
  }
  
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
