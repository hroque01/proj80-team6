import { createRouter, createWebHistory } from 'vue-router';

import AppDishes from './components/AppDishes.vue';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/dishes/:id',
            name: 'dish-detail',
            component: AppDishes
        },
    ]
});
export default router;