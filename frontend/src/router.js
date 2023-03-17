import { createRouter, createWebHistory } from 'vue-router';

import AppRestaurantMainPage from './components/AppRestaurantMainPage.vue';

import AppCart from './components/AppCart.vue';

//import AppData from './components/AppData.vue';

import AppPayment from './components/AppPayment.vue';

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
            path: '/cart',
            name: 'cart',
            component: AppCart
        },
        // {
        //     path: '/data',
        //     name: 'data',
        //     component: AppData
        // },
        {
            path: '/payment',
            name: 'payment',
            component: AppPayment
        },
    ]
});
export default router;