<script>

import axios from 'axios';

import { store } from '../store';

const API_URL = 'http://localhost:8000/api/v1/';

export default {
    name: 'AppCheckout',
    data() {
        return {
            store,
            cart: [],
            deliveryPrice: null,
            cartTotal: 0,
            cartadd: {
                id: "",
                name: "",
                price: "",
                image: "",
                restaurant_id: "",
            },
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
            restaurantId: null,
        };
    },
    created() {
        this.getCartData();
    },
    methods: {
        getCartData() {
            this.deliveryPrice = store.deliveryPrice;
            this.cartTotal = store.total;
            if (localStorage.getItem("cart")) {
                this.cart = JSON.parse(localStorage.getItem("cart"));
            }
        },
        emptyCart() {
            this.cart = [];
            localStorage.clear();
        },
        added(dish) {
            // when user choose a buy, this function add that in cart
            const item = Object.values(this.cart).find(item => item.id === dish.id);
            if (item) {
                item.quantity += 1;
                this.saveCats();
            } else {
                // cartadd is here to get all things that click or chosen by user
                this.cartadd.id = dish.id;
                this.cartadd.name = dish.name;
                this.cartadd.price = dish.price;
                this.cartadd.image = dish.image;
                this.cartadd.quantity = 1;
                this.cartadd.restaurant_id = dish.restaurant_id;
                this.cart.push(this.cartadd);
                this.cartadd = {};

                this.saveCats(); // this function most important to save all inform of products
            }
            this.updateTotal();
            console.log(this.cartTotal);
        },
        remove(id) {
            const item = Object.values(this.cart).find(item => item.id === id);
            if (item !== undefined) {
                item.quantity -= 1;
                if (item.quantity <= 0) {
                    const index = this.cart.indexOf(item);
                    this.cart.splice(index, 1);
                    if (this.cart.length == 0) {
                        localStorage.removeItem('cart');
                        localStorage.removeItem('total');
                        localStorage.removeItem('deliveryPrice');
                    }
                }
                if (this.cart.length !== 0) {
                    this.saveCats();
                }
            }
            this.getCartData();
        },
        updateTotal() {
            let cart = this.cart;
            let sum = 0;
            let i = 0;
            while (i < cart.length) {
                let item = cart[i];
                sum += item.quantity * parseFloat(item.price);
                i++;
            }
            store.deliveryPrice = this.deliveryPrice;
            this.deliveryPrice = localStorage.getItem('deliveryPrice');
            sum += parseFloat(this.deliveryPrice);
            this.cartTotal = sum;
            store.total = this.cartTotal;
            localStorage.setItem('total', this.cartTotal);
        },
        saveCats() {
            // per salvare nel local storage:
            let parsed = JSON.stringify(this.cart);
            localStorage.setItem("cart", parsed);
            this.getCartData();
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
        orderSubmit(e) {
            e.preventDefault();
            console.log(this.newOrder);

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
        },
        findRestaurant() {
            const cartItem = localStorage.getItem('cart');
            let element;

            if (cartItem) {
                element = JSON.parse(cartItem);

                this.restaurantId = element[0].restaurant_id;

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
            this.newOrder.completed = true;
        },
        onOrderSubmitted() {
            store.total = 0; // Svuotiamo il carrello
        },

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
        });
    },
    updated() {
        this.updateTotal();
    }
}

</script>

<template>
    <div class="my_container" v-if="$route.name === 'checkout'">
        <div class="cart" v-if="this.cart.length !== 0">
            <h3>Il tuo ordine</h3>
            <div v-for="item in this.cart">
                <div class="d-flex justify-content-between align-items-center">

                    <div>{{ item.name }}</div>

                    <div>{{ parseFloat(item.price * item.quantity).toFixed(2) }}€</div>
                </div>
                <div class="modify-order">
                    <div class="btn-order">
                        <div @click="remove(item.id)">
                            <i class="sign-order fa-solid fa-circle-minus"></i>
                        </div>
                        {{ item.quantity }}
                        <div @click="added(item)">
                            <i class="sign-order fa-solid fa-circle-plus"></i>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mt-3">
            <div class="d-flex justify-content-between">
                <div>
                    <b>Consegna</b>
                </div>
                <div>
                    {{ store.deliveryPrice }} €
                </div>
            </div>
            <hr class="mt-4">
            <div class="d-flex justify-content-between">
                <div>
                    <b>Totale</b>
                </div>
                <div>
                    <b v-if="store.total">{{ parseFloat(store.total).toFixed(2) }} €</b>
                </div>
            </div>
            <button @click="emptyCart">Svuota carrello</button>
        </div>
        <!-- carrello vuoto -->
        <div class="empty_cart" v-else>
            <h3><i class="fa-solid fa-cart-shopping"></i> Il tuo deliveboo</h3>
            <img src="/public/img/logo-white.png" alt="logo deliveboo">
            <p>Non hai ancora aggiunto alcun prodotto. Quando lo farai, compariranno qui!</p>
        </div>
        <!-- fine carrello vuoto -->

        <div class="form-cart">
            <form>

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

                <!-- Deve apparire solamente quando  il secondo form esce "pagamento eseguitp" -->
                <input @click="orderSubmit" type="submit" value="Procedi all'ordine">
            </form>

            <div>
                <div id="dropin-container">
                </div>
                <button id="submit-button">Conferma pagamento</button>
            </div>

            <button>Vai al pagamento</button>
        </div>


    </div>
</template>

<router-view v-if="$route.name === 'order'"></router-view>
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

        .modify-order {
            font-size: 18px;
            display: flex;
            height: 100%;
            align-items: center;


            .btn-order {
                display: flex;
                align-items: center;
                width: 70px;
                text-align: left;

                .sign-order {
                    color: $btn_red;
                    margin: 0 5px;
                    cursor: pointer;
                }
            }
        }
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
