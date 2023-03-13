import { createRouter, createWebHistory } from 'vue-router';

import AppRestaurantMainPage from './components/AppRestaurantMainPage.vue';

import AppCheckout from './components/AppCheckout.vue';

import App from './App.vue';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            name: 'home',
            component: App
        },
        {
            path: '/restaurant/dishes/:id',
            name: 'restaurant-detail',
            component: AppRestaurantMainPage
        },
        {
            path: '/checkout',
            name: 'cart',
            component: AppCheckout
        },
    ]
});
export default router;