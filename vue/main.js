import Vue from 'vue';
import VueRouter from 'vue-router';
import HighchartsVue from 'highcharts-vue'

import { store } from './store';
import { routes } from './routes'
import vuetify from './plugins/vuetify'

import './styles/main.scss';

function init(courseId) {

    // We need to overwrite the variable for lazy loading.
    __webpack_public_path__ = M.cfg.wwwroot + '/local/helloworld/amd/build/';

    // Vue plugins
    Vue.use(VueRouter);
    Vue.use(HighchartsVue)

    store.commit('setCourseID', courseId);
    // store.dispatch('init');

    // base URL is /local/helloworld/index.php/[course id]/
    const currentUrl = window.location.pathname;
    const base = currentUrl.substr(0, currentUrl.indexOf('.php')) + '.php/' + courseId + '/';

    const router = new VueRouter({
        mode: 'history',
        routes,
        base
    });

    // router.beforeEach((to, from, next) => {
        // Find a translation for the title.
        // if (to.hasOwnProperty('meta') && to.meta.hasOwnProperty('title')) {
        //     if (store.state.strings.hasOwnProperty(to.meta.title)) {
        //         document.title = store.state.strings[to.meta.title];
        //     }
        // }
    //     next()
    // });

    new Vue({
        vuetify,
        store,
        router,
    }).$mount('#app');
}

export {init};
