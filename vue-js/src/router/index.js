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
      path: '/PersonalInformation',
      name: 'PersonalInformation',
      component: () => import('../views/PersonalInformationView.vue')
    },
    {
      path: '/maintainence',
      name: 'maintainence',
      component: () => import('../views/MaintainenceView.vue')
    },
    {
      path: '/AnnouncementManage',
      name: 'AnnouncementManage',
      component: () => import('../views/Maintainence/AnnouncementManagementView.vue')
    },
    {
      path: '/AnnouncementDetailView',
      name: 'AnnouncementDetailView',
      component: () => import('../views/Announcement/AnnouncementDetailView.vue')
    },
    {
      path: '/AccountManage',
      name: 'AccountManage',
      component: () => import('../views/Maintainence/AccountManagementView.vue')
    },
    {
      path: '/AccountCreate',
      name: 'AccountCreate',
      component: () => import('../views/Account/AccountCreateView.vue')
    },
    {
      path: '/AdvAudit',
      name: 'AdvAudit',
      component: () => import('../views/Maintainence/AuditView.vue')
    },
    {
      path: '/ReportManage',
      name: 'ReportManage',
      component: () => import('../views/Maintainence/ReportManagementView.vue')
    },
    {
      path: '/ReportObject',
      name: 'ReportObject',
      component: () => import('../views/Report/ReportObjectView.vue')
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
      path: '/VisitForm',
      name: 'VisitForm',
      component: () => import('../views/Visit/VisitFormView.vue')
    },
    {
      path: '/forum',
      name: 'forum',
      component: () => import('../views/ForumView.vue')
    },
    {
      path: '/VisitSearchPage',
      name: 'VisitSearchPage',
      component: () => import('../views/Visit/VisitSearchView.vue')
    },
    {
      path: '/forum/:id',
      name: 'forumPost',
      component: () => import('../views/ForumView.vue')
    }
  ]
})

export default router
