<script>

import axios from 'axios';

const API_URL = 'http://localhost:8000/api/v1/';

export default {
    name: 'AppData',
    data() {
        return {
            orders: [],
            newOrder: {
                customer_name: '',
                address: '',
                email: '',
                phone_number: '',
                total: 0,
                restaurantId: ''
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

            const newOrder = this.newOrder;

            axios.post(API_URL + 'order/store', newOrder)
                .then(res => {
                    const data = res.data;
                    const success = data.success;

                    if (success) {
                        this.updateOrders();
                    }
                })
                .catch(err => console.log(err));
        },
        findRestaurant(){
            const cartItem = localStorage.getItem('storedQuantity_0');
            let element;

            if(cartItem){
                element= JSON.parse(cartItem);

                this.restaurantId = element.restaurant_id;

                this.newOrder.restaurantId = this.restaurantId;

                console.log(this.newOrder.restaurantId)
            }
        }
    },
    mounted() {
        this.updateOrders();
        this.findRestaurant();
    }
};
</script>

<template>
    Info Dati



    <ul v-for="(order, index) in orders" :key="index">
        <li>
            {{ order.customer_name }} - {{ order.address }}
        </li>
    </ul>

    <form>

        <!-- nome -->
        <div class="flex-form">
            <label for="customer_name">Inserisci il tuo nome e cognome<span>*</span></label>
            <input type="text" placeholder="Mario Rossi" name="customer_name" id="customer_name"
                v-model="newOrder.customer_name" required>
        </div>

        <!-- indirizzo -->
        <div class="flex-form">
            <label for="address">Inserisci il tuo indirizzo<span>*</span></label>
            <input type="text" placeholder="Via Roma, 10" name="address" v-model="newOrder.address" required>
        </div>

        <!-- email -->
        <div class="flex-form">
            <label for="email">Inserisci la tua email<span>*</span></label>
            <input type="email" placeholder="email@prova.it" name="email" v-model="newOrder.email" required>
        </div>

        <!-- telefono -->
        <div class="flex-form">
            <label for="phone_number">Inserisci il tuo telefono<span>*</span></label>
            <input type="text" placeholder="3468888888" name="phone_number" v-model="newOrder.phone_number" required>
        </div>


        <div class="flex-form">
            <label for="total">Totale<span>*</span></label>
            <input type="number" step=".01" placeholder="totale" name="total" required v-model="newOrder.total">
        </div>

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