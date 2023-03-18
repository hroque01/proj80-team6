<script>

import axios from 'axios';

import { store } from '../store';

const API_URL = 'http://localhost:8000/api/v1/';

export default {
    name: 'AppData',
    data() {
        return {
            store,
            orders: [],
            cartTotalValue: 0,
            newOrder: {
                customer_name: '',
                restaurant_id: '',
                create_time: '',
                total: '',
                address: '',
                email: '',
                phone_number: '',
                order_number: '',
                create_date: '',
                completed: ''
            },
            restaurantId: null,
        };
    },
    methods: {
        updateOrders() {
            axios.get(API_URL + 'order')
                .then(res => {
                    const data = res.data;
                    const success = data.success;
                    const response = data.response;
                    const orders = response.orders;

                    if (success) {
                        this.orders = orders;
                    }
                })
                .catch(err => console.log(err));
        },
        orderSubmit(e) {
            e.preventDefault();

            if (this.newOrder.customer_name || this.newOrder.address || this.newOrder.email || this.newOrder.phone_number) {
                axios.post(API_URL + 'order/store', this.newOrder)
                    .then(res => {
                        const data = res.data;
                        const success = data.success;
                        if (success) {
                            this.updateOrders();
                            this.$router.push('/payment');
                        }
                    })
                    .catch(err => console.log(err));
            }
        },

        findRestaurant() {
            const cartItem = localStorage.getItem('cart');
            let element;

            if (cartItem) {
                element = JSON.parse(cartItem);

                this.restaurantId = element[0].id;

                this.newOrder.restaurant_id = this.restaurantId;
            }
        },
        getCurrentTime() {
            const options = { hour: '2-digit', minute: '2-digit' };
            const currentTime = new Date().toLocaleTimeString('it-IT', options);
            this.newOrder.create_time = currentTime;
        },
        getOrderNumber() {
            const randomNumber = Math.floor(Math.random() * 1000) + 1;

            this.newOrder.order_number = randomNumber.toString();
        },
        getPrice() {
            if (localStorage.total) {
                this.cartTotalValue = localStorage.total;
                store.total = this.cartTotalValue;
            } else {
                this.cartTotalValue = 0;
                store.total = this.cartTotalValue;
            }
            localStorage.total = this.cartTotalValue;

            this.cartTotalValue = localStorage.total;

            this.newOrder.total = parseFloat(this.cartTotalValue).toFixed(2);
        },
        getDate() {
            let create_date = new Date().toISOString().slice(0, 10);

            this.newOrder.create_date = create_date;
        },
        getCompleted() {
            let bool = Math.floor(Math.random() * 0) + 1;

            this.newOrder.completed = bool;
        }

    },
    mounted() {
        this.updateOrders();
        this.findRestaurant();
        this.getCurrentTime();
        this.getOrderNumber();
        this.getPrice();
        this.getDate();
        this.getCompleted();
    }
};
</script>

<template>
    <!-- Info Dati

        <form>

            <div class="flex-form">
                <label for="customer_name">Inserisci il tuo nome e cognome<span>*</span></label>
                <input type="text" placeholder="Mario Rossi" name="customer_name" v-model="newOrder.customer_name" required
                    class="input-form">
            </div>

            <div class="flex-form">
                <label for="address">Inserisci il tuo indirizzo<span>*</span></label>
                <input type="text" placeholder="Via Roma, 10" name="address" v-model="newOrder.address" required
                    class="input-form">
            </div>

            <div class="flex-form">
                <label for="email">Inserisci la tua email<span>*</span></label>
                <input type="email" placeholder="email@prova.it" name="email" v-model="newOrder.email" required
                    class="input-form">
            </div>

            <div class="flex-form">
                <label for="phone_number">Inserisci il tuo telefono<span>*</span></label>
                <input type="text" placeholder="3468888888" name="phone_number" v-model="newOrder.phone_number" required
                    class="input-form">
            </div>

            <input @click="orderSubmit" type="submit" value="Invia">

        </form> -->
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;

form {
    width: 600px;
    padding: 20px;
    display: flex;
    flex-direction: column;
    // debug
    border: 1px solid black;

    .flex-form {
        @include flex(between);
        margin: 10px 0;

        span {
            color: $btn_red;
        }

        input {
            padding: 5px;
            width: 55%;
        }
    }

    input[type="submit"] {
        align-self: center;
        margin-top: 10px;
        padding: 0 15px;
    }

}
</style>