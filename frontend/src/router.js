import { createRouter, createWebHistory } from 'vue-router';

import AppRestaurantMainPage from './components/AppRestaurantMainPage.vue';

import AppCheckout from './components/AppCheckout.vue';

import AppOrder from './components/AppOrder.vue';

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
            path: '/restaurant/:id',
            name: 'restaurant-detail',
            component: AppRestaurantMainPage
        },
        {
            path: '/checkout',
            name: 'checkout',
            component: AppCheckout
        },

        {
            path: '/order',
            name: 'order',
            component: AppOrder
        },
    ]
});
export default router;