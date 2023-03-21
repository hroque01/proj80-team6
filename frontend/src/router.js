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
            path: '/restaurant/:id',
            name: 'restaurant-detail',
            component: AppRestaurantMainPage
        },
        {
            path: '/checkout',
            name: 'checkout',
            component: AppCheckout
        },
    ],
    scrollBehavior(to, from, savedPosition) {
        // always scroll to top
        return { top: 0 }
    },
});

// router.beforeEach((to, from, next) => {
//     window.scrollTo(0, 0);
//     next();
// });

export default router;