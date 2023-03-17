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
            newOrder: {
                customer_name: '',
                restaurant_id: '',
                create_time: '',
                total: '',
                address: '',
                email: '',
                phone_number: '',
                order_number: ''
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
        },

        findRestaurant() {
            const cartItem = localStorage.getItem('storedQuantity_0');
            let element;

            if (cartItem) {
                element = JSON.parse(cartItem);

                this.restaurantId = element.restaurant_id;

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
            const data = {};
            if (store.length !== 0) {
                for (let key in localStorage) {
                    data[key] = JSON.parse(localStorage.getItem(key));
                }
            }
            // Prendi solo le chiavi degli elementi che iniziano con "storedQuantity_"
            //La funzione Object.keys() viene utilizzata per recuperare un array di tutte le chiavi presenti nell'oggetto localStorage.
            const itemKeys = Object.keys(localStorage).filter(key => key.startsWith("storedQuantity_"));
            // Somma la quantità e il prezzo per ogni elemento con lo stesso nome
            const items = {};
            let total = 0;
            itemKeys.forEach(key => {
                const item = JSON.parse(localStorage.getItem(key));
                const name = item.name;
                if (items[name]) {
                    items[name].quantity += 1;
                    items[name].price = parseFloat(items[name].price) + parseFloat(item.price);
                } else {
                    items[name] = { name: item.name, quantity: 1, price: parseFloat(item.price) };
                }
                total += parseFloat(item.price);

                this.newOrder.total = total.toFixed(2);
            });
        }

    },
    mounted() {
        this.updateOrders();
        this.findRestaurant();
        this.getCurrentTime();
        this.getOrderNumber();
        this.getPrice();
    }
};
</script>

<template>
    Info Dati

    <form>

        <!-- nome -->
        <div class="flex-form">
            <label for="customer_name">Inserisci il tuo nome e cognome<span>*</span></label>
            <input type="text" placeholder="Mario Rossi" name="customer_name" id="customer_name"
                v-model="newOrder.customer_name" required>
        </div>

        <div class="flex-form">
            <label for="address">Inserisci il tuo indirizzo<span>*</span></label>
            <input type="text" placeholder="Via Roma, 10" name="address" v-model="newOrder.address" required>
        </div>

        <div class="flex-form">
            <label for="email">Inserisci la tua email<span>*</span></label>
            <input type="email" placeholder="email@prova.it" name="email" v-model="newOrder.email" required>
        </div>

        <div class="flex-form">
            <label for="phone_number">Inserisci il tuo telefono<span>*</span></label>
            <input type="text" placeholder="3468888888" name="phone_number" v-model="newOrder.phone_number" required>
        </div>

        <!-- <div class="flex-form">
                                                                            <label for="total">Totale<span>*</span></label>
                                                                            <input type="number" step=".01" placeholder="totale" name="total" required v-model="newOrder.total">
                                                                        </div> -->

        <input @click="orderSubmit" type="submit" value="Invia">

    </form>
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