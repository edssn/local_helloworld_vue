// You have to use child routes if you use the same component. Otherwise the component's beforeRouteUpdate
// will not be called.

import courseDesign from './components/course-design/course-design';

export const routes = [
    {
        path: '/',
        redirect: { name: 'home' }
    }, {
        path: '/home',
        name: 'home',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: () => import ( /* webpackChunkName: "home" */ './components/home.vue')
    },
    {
        path: '/test',
        name: 'test',
        component: () => import ( /* webpackChunkName: "test" */ './components/test.vue')
    },
    {
        path: '/code',
        name: 'code',
        component: () => import ( /* webpackChunkName: "code" */ './components/code.vue')
    },
    {
        path: '/chart',
        name: 'chart',
        component: () => import ( /* webpackChunkName: "chart" */ './components/chart.vue')
    },
    {
        path: '/logs',
        name: 'Logs',
        component: () => import ( /* webpackChunkName: "logs" */ './components/logs.vue')
    },
    {
        path: '/course-design',
        name: 'course-design',
        component: courseDesign,
        children: [
            {
                path: '/',
                redirect: { name: 'weeks' }
            },
            {
                path: 'weeks',
                name: 'weeks',
                component: () => import ( /* webpackChunkName: "weeks" */ './components/course-design/weeks.vue')
            },
            {
                path: 'resource',
                name: 'resource',
                component: () => import ( /* webpackChunkName: "resource" */ './components/course-design/resource.vue')
            },
            {
                path: 'activity',
                name: 'activity',
                component: () => import ( /* webpackChunkName: "activity" */ './components/course-design/activity.vue')
            },
            {
                path: 'general',
                name: 'general',
                component: () => import ( /* webpackChunkName: "general" */ './components/course-design/general.vue')
            }
        ]
    },
    {
        path: '*',
        name: 'Not Found',
        component: () => import ( /* webpackChunkName: "not-found" */ './components/not-found.vue')
    },
]