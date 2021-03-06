import Vue from 'vue'
import Vuex from 'vuex'

import Teams from './modules/teams';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        Teams
    },
})
