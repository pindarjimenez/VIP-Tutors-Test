import VueRouter from 'vue-router';
import Nba from './components/Nba.vue';

let routes = [
    {
        name: 'NbaModule',
        path: '/',
        component: Nba
    },
];

export default new VueRouter({
    routes,
});
