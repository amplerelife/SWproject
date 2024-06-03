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
      path: '/login',
      name: 'login',
      component: () => import('../views/LoginView.vue')
    },
    {
      path: '/rent',
      name: 'rent',
      component: () => import('../views/RentView.vue')
    },
    {
      path: '/AuditPost',
      name: 'AuditPost',
      component: () => import('../views/Rent/AuditPostPage.vue')
    },
    {
      path: '/CreatePost',
      name: 'CreatePost',
      component: () => import('../views/Rent/CreatePostPage.vue')
    },
    {
      path: '/EditPost',
      name: 'EditPost',
      component: () => import('../views/Rent/EditPostPage.vue')
    },
    {
      path: '/ViewPost',
      name: 'ViewPost',
      component: () => import('../views/Rent/ViewPostPage.vue')
    },



    {
      path: '/visit',
      name: 'visit',
      component: () => import('../views/VisitView.vue')
    },
    {
      path:'/VisitForm',
      name:"VisitForm",
      component: () => import('../views/VisitFormView.vue')
    },
    {
      path: '/forum',
      name: 'forum',
      component: () => import('../views/ForumView.vue')
    }
  ]
})

export default router
