import { createRouter, createWebHistory } from 'vue-router';

import landingPage from '../pages/index.vue'

import dashboard from '../admin/pages/dashboard.vue'

import tasks from '../admin/partials/list_task.vue'

import users from '../admin/partials/list_user.vue'

import login from '../pages/login.vue'

import notFound from '../pages/notfound.vue'

const routes = [
    // landing page route
    {
        path:'/',
        component: landingPage
    },
    {
        path:'/:pathMatch(.*)*',
        component: notFound
    },

    // admin page route
    {
        path:'/dashboard',
        component: dashboard
    },
    {
        path:'/tasks',
        component: tasks
    },
    {
        path:'/users',
        component: users
    },
    {
        path:'/login',
        component: login
    },

]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router