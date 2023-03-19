<script>

import axios from 'axios';

import { store } from '../store';

const API_URL = 'http://localhost:8000/api/v1/';

export default {
    name: 'AppCheckout',
    data() {
        return {
            store,
            cartTotalValue: 0,
            orders: [],
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
                completed: '',
            },
            showForm1: true,
            restaurantId: null,
            showForm2: false,
        };
    },
    methods: {
        emptyCart() {
            localStorage.clear();
            store.length = 0;
            store.total = 0;
        },
        getCartTotal() {
            if (localStorage.total) {
                this.cartTotalValue = localStorage.total;
                store.total = this.cartTotalValue;
            } else {
                this.cartTotalValue = 0;
                store.total = this.cartTotalValue;
            }
            localStorage.total = this.cartTotalValue;
        },
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
        //butta tutto in database
        orderSubmit() {
            console.log(this.newOrder);
            
            if (localStorage.getItem('paid') == 'true') {
                axios.post(API_URL + 'order/store', this.newOrder)
                    .then(res => {
                        const data = res.data;
                        const success = data.success;
                        if (success) {
                            this.updateOrders();
                            localStorage.clear();
                            store.total = 0;
                            this.$router.push('/order');
                        }
                    })
                    .catch(err => console.log(err));
                } else {
                    console.log('Il pagamento non è stato effettuato con successo.');
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
        },
        prosegui() {
        },
        submitForm1() {
            this.showForm1 = false;
        },
        submitForm2() {
            this.showForm1 = true;
        }

    },
    computed: {
        getItems() {
            const data = {};
            // Popola l'oggetto data con tutti gli elementi presenti in localStorage
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
            });
            store.total = total;
            return items;
        },
    },
    mounted() {
        this.getCartTotal();
        this.updateOrders();
        this.findRestaurant();
        this.getCurrentTime();
        this.getOrderNumber();
        this.getPrice();
        this.getDate();
        this.getCompleted();

        const button = document.getElementById('submit-button');
        braintree.dropin.create({
            authorization: 'sandbox_zjjssg84_pwdgvf89z8k3wgdg',
            selector: '#dropin-container',
            locale: 'it_IT',
        }, function (err, instance) {
            if (button) {
                button.addEventListener('click', function () {
                    instance.requestPaymentMethod(function (err, payload) {
                        if (payload) {
                            console.log(localStorage.getItem('paid'));
                            localStorage.setItem('paid', true);
                            console.log(localStorage.getItem('paid'));
                        } else {
                            console.log("Dentro errore paymenent", err, payload);
                            console.log(localStorage.getItem('paid'));
                        }
                    });
                })
            }
        });
    }
    } 

</script>

<template>
    <div class="my_container" v-if="$route.name === 'checkout'">
        <div class="cart">
            <h3>
                Carrello bello
            </h3>
            <div v-if="store.total > 0">
                Totale: {{ parseFloat(store.total).toFixed(2) }}
            </div>
        </div>

        <div class="form-cart">
            <form v-show="showForm1" @submit.prevent="submitForm1">

                <div>
                    <div class="flex-form">
                        <label for="customer_name">Inserisci il tuo nome e cognome<span>*</span></label>
                        <input type="text" placeholder="Mario Rossi" name="customer_name" v-model="newOrder.customer_name"
                            required class="input-form">
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
                        <input type="text" placeholder="3468888888" name="phone_number" v-model="newOrder.phone_number"
                            required>
                    </div>
                </div>
                <button @click.prevent="showForm2 = true">Prosegui</button>

                <!-- Deve apparire solamente quando  il secondo form esce "pagamento eseguitp" -->
                <input @click="orderSubmit()" type="submit" value="Invia">
            </form>

            <div v-show="showForm2">
                <div id="dropin-container">
                </div>
                <button id="submit-button">Prosegui</button>              
            </div>
            
            
            <!-- <button @click="prosegui" v-if="!showSubmit" class="prosegui">Prosegui</button> -->
        </div>

    </div>

    <router-view v-if="$route.name === 'order'"></router-view>
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;

.my_container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 30px;

    .form-cart {
        width: 80%;
        border: 1px solid black;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        padding: 10px;

    }

    .cart {
        border: 1px solid #000;
        height: 307px;
        width: 20%;
    }

    form {
        width: 100%;
        height: 90%;
        padding: 20px;
        // debug

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
            margin-top: 10px;
            padding: 0 15px;
        }

    }
}
</style>