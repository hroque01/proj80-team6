<script>

import axios from 'axios';

import { store } from '../store';

const API_URL = 'http://localhost:8000/api/v1/';

export default {
    name: 'AppCheckout',
    data() {
        return {
            // a te che stai leggendo questo codice, buona fortuna e sai perchè? perchè non capirete nulla perchè  
            // neanche noi sappiamo come faccia a funzionare tutto. PS: SAVE CATS ALWAYS!
            hideCart: false,
            showPayment: false,
            showForm: false,
            prova: true,
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
            errors: {},
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
                        this.showPayment = true;
                        document.getElementById('submit-button').classList.remove("clickedBtnPay");
                        // localStorage.clear();
                        // store.total = 0;
                        // this.$router.push('/order');
                        document.getElementById('dropin-container').classList.remove("clickedBtnPay");
                    }
                })
                .catch(err => console.log(err));

            // this.errors = {};
            // if (!this.newOrder.customer_name) {
            //     this.errors.customer_name = 'Inserisci il campo!';
            // }
            // if (!this.newOrder.address) {
            //     this.errors.address = 'Inserisci il campo!';
            // }
            // if (!this.newOrder.email) {
            //     this.errors.email = 'Inserisci il campo!';
            // }
            // if (!this.newOrder.phone_number) {
            //     this.errors.phone_number = 'Inserisci il campo!';
            // }
            // if (Object.keys(this.errors).length === 0) {
            //     this.orderSubmit();
            // }
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
        proceed() {
            this.showForm = true;
            document.querySelector(".form-cart").classList.remove("clickedBtnPay");
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
                            localStorage.clear();
                            store.total = 0;
                            // this.$router.push('/order');
                            console.log(localStorage.getItem('paid'));
                            localStorage.setItem('paid', true);
                            axios.post(API_URL + 'invia-email')
                                .then(response => {
                                    console.log(response.data);
                                })
                                .catch(error => {
                                    console.log(error);
                                });

                            console.log(localStorage.getItem('paid'));

                            button.classList.add('clickedBtnPay');
                            document.getElementById('dropin-container').classList.add('clickedBtnPay');
                            document.querySelector('.cart').classList.add('clickedBtnPay');

                            document.getElementById('confirmEmail').classList.remove('clickedBtnPay');

                            document.getElementById('confirmEmail').classList.add('flex-style');
                        } else {
                            console.log("Dentro errore paymenent", err, payload);
                            console.log(localStorage.getItem('paid'));
                        }
                    });
                })
            }
        });

    },
    updated() {
        this.updateTotal();
    }
}

</script>

<template>
    <div class="my_container" v-if="$route.name === 'checkout'">
        <div class="cart" v-if="this.cart.length !== 0 && !hideCart">
            <h4>Il tuo ordine da <span>{{ cart[0].restaurant_name }}</span></h4>

            <!-- carrello modificabile -->
            <div class="overflow">
                <div v-for="item in this.cart">
                    <div class="d-flex justify-content-between align-items-center">

                        <div><span v-if="showForm">{{ item.quantity }}x</span> {{ item.name }}</div>

                        <div>{{ parseFloat(item.price * item.quantity).toFixed(2) }}&euro;</div>
                    </div>

                    <!-- bottoni da nascondere quando carrello non più modificabile -->
                    <div class="modify-order" v-if="!showForm">
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
                <!-- chiusura carrello modificabile -->
            </div>


            <hr class="mt-3">
            <div class="d-flex justify-content-between">
                <div>
                    <b>Consegna</b>
                </div>
                <div>
                    {{ store.deliveryPrice }}&euro;
                </div>
            </div>
            <hr class="mt-4">
            <div class="d-flex justify-content-between">
                <div>
                    <b>Totale</b>
                </div>
                <div>
                    <b v-if="store.total">{{ parseFloat(store.total).toFixed(2) }}&euro;</b>
                </div>
            </div>


            <div class="cart-notification" v-if="!showForm">
                <button class="empty-cart-btn" @click="emptyCart">Svuota carrello</button>
                <button class="keep-cart-btn" @click="proceed">Prosegui</button>
            </div>

        </div>

        <!-- carrello vuoto -->
        <div class="empty_cart" v-else>
            <h3><i class="fa-solid fa-cart-shopping"></i> Il tuo deliveboo</h3>
            <img src="/public/img/logo-white.png" alt="logo deliveboo">
            <p>Non hai ancora aggiunto alcun prodotto. Quando lo farai, compariranno qui!</p>
        </div>
        <!-- fine carrello vuoto -->

        <!-- form -->
        <div class="form-cart clickedBtnPay">
            <form v-if="showForm && !showPayment">

                <div>
                    <h3>Dettagli cliente</h3>
                    <div class="flex-form">
                        <div class="items d-flex flex-column align-items-center">
                            <div class="items d-flex justify-content-between align-items-center">
                                <label for="customer_name">Nome e cognome<span>*</span></label>
                                <input type="text" placeholder="Mario Rossi" name="customer_name"
                                    v-model="newOrder.customer_name" required class="input-form">
                            </div>
                            <span v-if="errors.customer_name" class="error d-flex marginino">{{ errors.customer_name
                            }}</span>
                        </div>
                    </div>

                    <div class="flex-form">
                        <div class="items d-flex flex-column align-items-center">
                            <div class="items d-flex justify-content-between align-items-center">
                                <label for="address">Indirizzo<span>*</span></label>
                                <input type="text" placeholder="Via Roma, 10" name="address" v-model="newOrder.address"
                                    required>
                            </div>
                            <span v-if="errors.address" class="error d-flex marginino">{{ errors.address }}</span>
                        </div>
                    </div>

                    <div class="flex-form">
                        <div class="items d-flex flex-column align-items-center">
                            <div class="items d-flex justify-content-between align-items-center">
                                <label for="email">Email<span>*</span></label>
                                <input type="email" placeholder="email@prova.it" name="email" v-model="newOrder.email"
                                    required>
                            </div>
                            <span v-if="errors.email" class="error d-flex marginino">{{ errors.email }}</span>
                        </div>
                    </div>

                    <div class="flex-form">
                        <div class="items d-flex flex-column align-items-center">
                            <div class="items d-flex justify-content-between align-items-center">
                                <label for="phone_number">Recapito telefonico<span>*</span></label>
                                <input type="text" placeholder="3468888888" name="phone_number"
                                    v-model="newOrder.phone_number" required>
                            </div>
                            <span v-if="errors.phone_number" class="error d-flex marginino">{{ errors.phone_number }}</span>
                        </div>


                    </div>
                </div>

                <!-- Deve apparire solamente quando  il secondo form esce "pagamento eseguitp" -->
                <input @click="orderSubmit" type="submit" value="Vai al pagamento" v-if="!showPayment" class="form-data">
            </form>

            <div class="d-flex flex-column align-items-center cervelloAlbero">
                <div id="dropin-container" class="clickedBtnPay width-braintree"></div>
                <button id="submit-button" class="clickedBtnPay">Conferma pagamento</button>
            </div>

            <div class="clickedBtnPay" id="confirmEmail">
                <img src="../../public/img/logo-white.png" alt="logo deliveboo">
                <p>
                    Ciao <span>{{ newOrder.customer_name }}</span>!
                    Il tuo ordine &egrave; andato a buon fine.
                </p>
                <p><i class="fa-regular fa-envelope"></i> Controlla la tua email</p>
            </div>

        </div>


    </div>
</template>

<router-view v-if="$route.name === 'order'"></router-view>
<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;

.clickedBtnPay {
    display: none;
}

.flex-style {
    display: flex;
}

.my_container {
    display: flex;
    gap: 25px;

    h4 {
        font-weight: bold;
        margin-bottom: 20px;

        span {
            color: $btn_red;
        }
    }

    // carrello vuoto
    .empty_cart {
        text-align: center;
        width: 28%;
        background-color: #F9FAFA;
        border: 1px solid #eaeaea;
        box-shadow: 0px 5px 5px 0px #ececec;
        border-radius: 10px;
        padding: 20px 15px;
        margin: 0 auto;

        h3 {
            font-weight: bold;
            opacity: 0.8;
        }

        img {
            width: 200px;
            height: 200px;
            margin: 50px 0;
            padding: 5px;
            filter: grayscale(100%);
            opacity: 0.5;
            border: 1px solid $btn_red;
            border-radius: 50%;
            object-fit: contain;
        }

        p {
            font-size: 18px;
            opacity: 0.8;
        }
    }

    // carrello
    .cart {
        width: 28%;
        background-color: #F9FAFA;
        border: 1px solid #eaeaea;
        box-shadow: 0px 5px 5px 0px #ececec;
        border-radius: 10px;
        padding: 20px 25px;
        min-height: 400px;
        top: 120px;
        margin: 0 auto;

        .overflow {
            overflow-y: auto;
            max-height: 280px;
            padding: 0 10px;
        }

        // bottoni modifica quantità
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


        .cart-notification {
            display: flex;
            margin-top: 20px;

            .keep-cart-btn,
            .empty-cart-btn {
                width: calc(100% / 2 - 4px);
                margin-inline: 2px;
                border-radius: 10px;
                padding: 5px 0;
            }

            .empty-cart-btn {
                background-color: #F9FAFA;
                color: $btn_red;
                border: 1px solid $btn_red;

                &:hover {
                    border: 2px solid $btn_red;
                }
            }

            .keep-cart-btn {
                background-color: $btn_red;
                color: #F9FAFA;
                border: 2px solid $btn_red;

                &:hover {
                    background-color: #e96d5d;
                }
            }
        }
    }

    // form
    .form-cart {
        width: 70%;
        background-color: #F9FAFA;
        border: 1px solid #eaeaea;
        box-shadow: 0px 5px 5px 0px #ececec;
        min-height: 400px;
        border-radius: 10px;
        padding: 20px 15px;
        margin: 0 auto;

        //  form dati utente
        .flex-form {
            @include flex(between);
            margin: 20px 0;

            span {
                color: $btn_red;
            }

            input {
                padding: 6px;
                width: 55%;
                border-radius: 5px;
                border: 1px solid #ccc;
                outline: none;
            }
        }

        input[type="submit"] {
            border: 3px solid $btn_red;
            background-color: #F9FAFA;
            border-radius: 10px;
            color: $btn_red;
            padding: 3px 10px;

            &:hover {
                background-color: $btn_red;
                color: #fff;
            }
        }

        .form-data {
            display: block;
            margin: 0 auto;
        }
    }

    // braintree
    .width-braintree {
        width: 500px;
    }

    .cervelloAlbero {

        button {
            margin-top: 20px;
            border: 3px solid $btn_red;
            background-color: #F9FAFA;
            border-radius: 10px;
            color: $btn_red;
            padding: 3px 10px;


            &:hover {
                background-color: $btn_red;
                color: #fff;
            }
        }

    }

    // messaggio conferma ordine:
    #confirmEmail {
        text-align: center;
        font-size: 20px;
        padding: 20px 0;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        height: 100%;

        img {
            width: 70px;
            height: 70px;
            object-fit: contain;
            border-radius: 50%;
            padding: 2px;
            border: 2px solid $btn_red;
        }

        .logo {
            margin-left: 10px;
            color: $btn_red;
            font-weight: bold;
        }

        p {
            margin: 10px 0;
        }

        .fa-envelope,
        span {
            color: $btn_red;
        }
    }

}

.items {
    width: 100%;
}

.marginino {
    margin-left: 5%;
}


@media only screen and (max-width: 1210px) {

    .my_container {

        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;

        .cart {
            width: 70%;
        }
    }

}

@media only screen and (max-width: 950px) {

    .my_container {

        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;

        .cart {
            width: 95%;
        }

        .form-cart {
            margin-top: 15px;
            width: 95%;
        }

        .width-braintree {
            width: 95%;
        }
    }

}

@media only screen and (min-width: 350px) and (max-width: 780px) {
    .my_container {
        .empty_cart {
            width: 100%;
        }
    }
}

@media only screen and (min-width: 781px) and (max-width: 979px) {
    .my_container {
        .empty_cart {
            width: 80%;
        }
    }
}

@media only screen and (max-width: 980px) {
    .my_container {
        .empty_cart {
            width: 80%;
        }
    }
}
</style>