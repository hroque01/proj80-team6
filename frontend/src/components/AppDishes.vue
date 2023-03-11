<script>

import { store } from '../store';

import axios from 'axios';

const API_URL = 'http://localhost:8000/api/v1/';

export default {
    name: 'AppDishes',
    data() {
        return {
            store,
            dishes: []
        }
    },
    methods: {
        getDishes() {
            axios.get(API_URL + 'dish/all')
                .then(res => {

                    const data = res.data;
                    const success = data.success;
                    const response = data.response;

                    const dishes = response.dishes;

                    if (success) {
                        this.dishes = dishes;
                    }
                })
                .catch(err => console.error(err));
        },
        addDish(id) {

            store.quantity.push(this.dishes[id]);

            localStorage.setItem(store.quantity, JSON.stringify(store.quantity));

            store.storedArray = JSON.parse(localStorage.getItem(store.quantity));

            store.length = localStorage.length;
        }
    },
    mounted() {
        this.getDishes();
    }
}
</script>

<template>
    <div class="my_container">

        <div v-for="(dish, index) in dishes" :key="index" class="dishes">
            <img :src="dish.image" :alt="dish.name">
            Nome piatto: {{ dish.name }}
            <br><br>
            <button @click="addDish(index)">Aggiungo al carrello</button>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;


.my_container {
    display: flex;
    justify-content: space-between;
    margin-top: 100px;
    border: 1px solid red;

    .dishes {
        border: 1px solid blue;
        padding: 10px;

        img {
            width: 100px;
        }
    }
}
</style>