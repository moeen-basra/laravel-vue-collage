import Vue from 'vue';
import Vuex, { Store } from 'vuex';

// import store props,
import state from './state';
import getters from './getters';
import mutations from './mutations';
import actions from './actions';

Vue.use(Vuex);

const store = new Store({
    state, getters, mutations, actions,
});

export default store;