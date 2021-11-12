import Vue from 'vue';
import Vuex from 'vuex';
import moodleAjax from 'core/ajax';
import moodleStorage from 'core/localstorage';
import Notification from 'core/notification';
import _ from 'lodash';
// import $ from 'jquery';
// import {MODE_INTRO, MODE_QUESTION_ANSWERED, MODE_QUESTION_SHOWN, VALID_MODES} from './constants';
// import mixins from './mixins';

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {},
    //strict: process.env.NODE_ENV !== 'production',
    mutations: {},
    getters: {},
    actions: {}
});

/**
 * Wrapper for ajax call to Moodle.
 */
export async function ajax(method, args) {
    const request = {
        methodname: method,
        args: Object.assign({
            coursemoduleid: store.state.courseModuleID
        }, args),
    };

    try {
        return await moodleAjax.call([request])[0];
    } catch (e) {
        Notification.exception(e);
        throw e;
    }
}
