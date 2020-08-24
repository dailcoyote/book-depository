import Vue from 'vue'
import VueRouter from 'vue-router'
import DefaultLayout from "../layout/DefaultLayout";

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Default',
    redirect: '/admin'
  }, 
  {
    path: '/admin',
    name: 'admin',
    component: DefaultLayout,
    redirect: 'admin/authors',
    children: [
      {
        path: 'authors',
        name: 'authors',
        component: () => import("../components/AuthorsList")
      },
      {
        path: 'authors/add',
        name: 'add-author',
        component: () => import("../components/AddAuthor")
      },
      {
        path: 'authors/:id',
        name: 'author',
        component: () => import("../components/Author")
      },
      {
        path: 'books',
        name: 'books',
        component: () => import("../components/BooksList")
      },
      {
        path: 'books/add',
        name: 'add-books',
        component: () => import("../components/AddBook")
      },
      {
        path: 'books/:id',
        name: 'book',
        component: () => import("../components/Book")
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
