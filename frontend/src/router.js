import { createRouter, createWebHistory } from 'vue-router';

import AppRestaurantMainPage from './components/AppRestaurantMainPage.vue';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/restaurant/dishes/:id',
            name: 'restaurant-detail',
            component: AppRestaurantMainPage
        },
    ]
});
export default router;