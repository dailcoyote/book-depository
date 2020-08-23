import Vue from 'vue'
import VueRouter from 'vue-router'
import DefaultLayout from "../layout/DefaultLayout";

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Default',
    redirect: '/admin/authors',
    component: DefaultLayout,
    children: [
      {
        path: 'admin/authors',
        name: 'authors',
        component: () => import("../components/AuthorsList")
      },
      {
        path: 'admin/books',
        name: 'books',
        component: () => import("../components/BooksList")
      }
    ],
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
