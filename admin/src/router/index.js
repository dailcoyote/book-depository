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
        path: 'admin/authors/add',
        name: 'add-author',
        component: () => import("../components/AddAuthor")
      },
      {
        path: 'admin/authors/:id',
        name: 'author',
        component: () => import("../components/Author")
      },
      {
        path: 'admin/books',
        name: 'books',
        component: () => import("../components/BooksList")
      },
      {
        path: 'admin/books/add',
        name: 'add-books',
        component: () => import("../components/AddBook")
      },
    ],
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
