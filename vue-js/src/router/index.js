import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      redirect: 'home'
    },
    {
      path: '/home',
      name: 'home',
      component: () => import('../views/HomeView.vue')
    },
    {
      path: '/rent',
      name: 'rent',
      component: () => import('../views/RentView.vue')
    },
    {
      path: '/visit',
      name: 'visit',
      component: () => import('../views/VisitView.vue')
    },
    {
      path: '/forum',
      name: 'forum',
      component: () => import('../views/ForumView.vue')
    }
  ]
})

export default router
