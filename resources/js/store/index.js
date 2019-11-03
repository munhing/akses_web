import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

import createPersistedState from 'vuex-persistedstate';

const store = new Vuex.Store({
    plugins: [createPersistedState()],
    state: {
        portuserTable: {
            limit: 25,
            query: 'kloc',
            page: 1,
            orderBy: {
                column: 'name',
                ascending: true
            }
        }
    },

    getters: {
        getLimit: state => {
            return state.portuserTable.limit;
        },
        getQuery: state => {
            return state.portuserTable.query;
        },
        getPage: state => {
            return state.portuserTable.page;
        },
        getOrderBy: state => {
            return state.portuserTable.orderBy;
        }
    },
    mutations: {
        setLimit(state, limit) {
            state.portuserTable.limit = limit;
        },
        setQuery(state, query) {
            state.portuserTable.query = query;
        },
        setPage(state, page) {
            state.portuserTable.page = page;
        },
        setOrderBy(state, orderBy) {
            console.log(orderBy);
            console.log(orderBy.column);
            console.log(orderBy.ascending);
            state.portuserTable.orderBy.column = orderBy.column;
            state.portuserTable.orderBy.ascending = orderBy.ascending;
        }
    },
    actions: {}
});

export default store;