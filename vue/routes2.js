import home from './components/home';
import test from './components/test';
import code from './components/code';
import chart from './components/chart';
import notFound from './components/not-found';

// You have to use child routes if you use the same component. Otherwise the component's beforeRouteUpdate
// will not be called.
export const routes = [
    {
        path: '/',
        redirect: { name: 'Home' }
    }, {
        path: '/home',
        name: 'Home',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: home
    },
    {
        path: '/test',
        name: 'Test',
        component: test
    },
    {
        path: '/code',
        name: 'Code',
        component: code
    },
    {
        path: '/chart',
        name: 'Chart',
        component: chart
    },
    {
        path: '*',
        name: 'Not Found',
        component: notFound
    },
]