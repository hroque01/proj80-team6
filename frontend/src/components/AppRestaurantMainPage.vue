<script>
import axios from 'axios';
import { store } from '../store';
const API_URL = 'http://localhost:8000/api/v1/';

export default {
  name: 'AppRestaurantMainPage',
  data() {
    return {
      restaurants: [],
      dishes: [],
      store,
      selRes: null,
      selResId: null,
      cartResId: null,
      deliveryPrice: null,
      requestChangeCart: false,
      cart: [],
      cartTotal: 0,
      cartadd: {
        id: "",
        name: "",
        price: "",
        image: "",
        restaurant_id: "",
      },
    }
  },
  created() {
    this.viewCart();
  },
  methods: {
    viewCart() {
      if (localStorage.getItem("cart")) {
        this.cart = JSON.parse(localStorage.getItem("cart"));
      }
    },
    getDishes() {
      if (this.$route.params.id && this.$route.name === 'restaurant-detail') {
        axios.get(API_URL + 'restaurant/' + this.$route.params.id)
          .then(res => {
            const data = res.data;
            const success = data.success;
            const response = data.response;
            const dishes = response.dishes;
            const restaurants = response.restaurants;
            const resDelPrice = response.restaurants[this.$route.params.id - 1].delivery_price;
            if (success) {
              this.dishes = dishes;
              this.restaurants = restaurants;
              this.deliveryPrice = resDelPrice;
            }
          })
          .catch(err => console.error(err));
      }
    },
    added(dish) {
      // when user choose a buy, this function add that in cart
      if (this.selResId == this.cartResId) {
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
      }
      else {
        this.requestChangeCart = true;
      }
      this.getTotal();
    },
    remove(id) {
      const item = Object.values(this.cart).find(item => item.id === id);
      if (item !== undefined) {
        item.quantity -= 1;
        if (item.quantity <= 0) {
          const index = this.cart.indexOf(item);
          this.cart.splice(index, 1);
          localStorage.removeItem('cart');
        }
        if (this.cart.length !== 0) {
          this.saveCats();
        }
      }
      this.getTotal();
    },
    getTotal() {
      if (this.cart) {
        let cart = this.cart;
        let sum = 0;
        let i = 0;
        while (i < cart.length) {
          let item = cart[i];
          sum += item.quantity * parseFloat(item.price);
          i++;
        }
        if (this.cart.length > 0) {
          sum += parseFloat(this.deliveryPrice);
        }
        this.cartTotal = sum;
      }
      store.total = this.cartTotal;
      localStorage.setItem('total', this.cartTotal);
    },
    // metodo per salvare i gatti: aiutooooo
    saveCats() {
      // per salvare nel local storage:
      let parsed = JSON.stringify(this.cart);
      localStorage.setItem("cart", parsed);
      this.viewCart(); 
    },
    filterRestaurants() {
      this.selResId = parseInt(this.$route.params.id);
      if (localStorage.getItem("cart")) {
        const cart = JSON.parse(localStorage.getItem('cart'));
        if (cart[0]) {
          const firstItem = cart[0];
          const cartRestaurantId = firstItem.restaurant_id;
          this.cartResId = cartRestaurantId;
        }
      }
      else {
        this.cartResId = this.selResId;
      }
    },
    emptyCart() {
      this.cart = [];
      localStorage.clear();
      this.requestChangeCart = false;
      this.cartResId = this.selResId;
      this.getTotal();
      store.total = this.cartTotal;
    },
    scrollToTop() {
      window.history.back();
      window.scrollBy(0, -1000);
    }
  },
  computed: {
    filteredRestaurants() {
      let selectedRestaurant = this.restaurants.filter(restaurant => restaurant.id === parseInt(this.$route.params.id));
      this.selRes = selectedRestaurant;

      return selectedRestaurant;
    },
  },
  mounted() {
    this.filterRestaurants();
    this.getDishes();
  },
  updated() {
    this.filterRestaurants();
    this.getTotal();
  },
  watch: {
    '$route.params.id': 'getDishes'
  }
}
</script>

<template>
  <section>

    <!-- restaurant header with image and info-->
    <div class="restaurant_header" v-for="(restaurant, index) in filteredRestaurants" :key="index">
      <div v-if="restaurant" class="flex-info-res my_container">

        <div class="back-button">
          <button @click="scrollToTop()">
            Torna ai ristoranti
          </button>
        </div>

        <div class="restaurant_image">
          <img :src="restaurant.image" :alt="restaurant.business_name">
        </div>

        <ul class="restaurant_informations">

          <li class="restaurantName">{{ restaurant.business_name }}</li>
          <li class="info-restaurant">
            <i class="fa-solid fa-location-dot"></i>{{ restaurant.address }}
          </li>
          <li>
            <i class="fa-solid fa-utensils"></i>{{ restaurant.description }}
          </li>
          <li>
            <i class="fa-solid fa-clock"></i>
            <!-- La funzione substring prende due argomenti: l'indice di partenza (inclusivo) e l'indice finale (esclusivo) della sottostringa da estrarre. Nel nostro caso, 0 è l'indice di partenza, mentre restaurant.opening_time.length - 2 -->
            {{ restaurant.opening_time.substring(0, restaurant.opening_time.length - 3) }}
            - {{ restaurant.closure_time.substring(0, restaurant.closure_time.length - 3) }}
          </li>
          <li>
            <i class="fa-solid fa-motorcycle"></i><span class="delivery">Consegna al costo di: {{
              restaurant.delivery_price }}&euro;</span>
          </li>
          <!-- <li>
                <a href="#dishes">Vedi i nostri men&ugrave;</a>
              </li> -->
        </ul>
      </div>
    </div>


    <div class="dish_cart">

      <div class="my_container menu-wrapper">

        <!-- restaurant menù list-->
        <div class="menu_list">

          <div class="my_Boxes-wrapper">

            <!-- image -->
            <div class="my_bigBox box-properties" v-for="(dish, index) in dishes" :key="index">
              <div class="info-top">

                <div class="my_bigBox-img">
                  <img :src="dish.image" :alt="dish.name">
                </div>

                <!-- info dish -->
                <div class="my_bigBox-info-wrapper">
                  <div class="my_bigBox-info-DishName">{{ dish.name }}</div>
                  <div class="my_bigBox-info-OtherDishInfo">

                    <div class="DishDescr">
                      <em>{{ dish.description }}</em>
                    </div>

                    <div class="DishIngredients">
                      Ingredienti: {{ dish.ingredients }}
                    </div>
                  </div>
                </div>
              </div>


              <div class="pay">
                <div class="dishPrice" v-if="dish">
                  <span class="Pricebuble"> {{ dish.price }} &euro;</span>
                </div>

                <button class="addToCart_btn" @click="added(dish)">
                  <i class="fa-solid fa-cart-shopping"></i>Aggiungi al carrello
                </button>
              </div>
            </div>

          </div>

        </div>

        <!-- cart right side-->
        <div class="cart">
<<<<<<< HEAD

          <!-- carrello con items -->
          <div class="modify-cart" v-if="this.cart.length !== 0 && this.requestChangeCart == false && this.cart.length !== 0">
            <h3>Il tuo ordine</h3>

            <!-- ciclo per stampare items con bottoni per modifica quantità -->
            <div class="row-order" v-for="item in cart" :key="item.id">

              <!-- items -->
              <div class="d-flex justify-content-between align-items-center">

                <div>{{item.name}}</div>

                <!-- totale -->
                <div >{{ parseFloat(item.price * item.quantity).toFixed(2) }}€</div>
=======
          <div v-if="this.cart.length !== 0 && this.requestChangeCart == false && this.cart.length !== 0">
            <strong>Carrello:</strong>
            <div>
              <button @click="emptyCart">SVUOTA CARRELLO</button>
            </div>
            <div v-for="item in cart" :key="item.id">
              <div class="d-flex justify-content-between">
                <div>
                  {{ item.name }}
                </div>
                <div>
                  <button @click="remove(item.id)">-</button> {{ item.quantity }} <button @click="added(item)">+</button>
                  {{
                    parseFloat(item.price * item.quantity).toFixed(2) }} €
                </div>
>>>>>>> 56558fb946450a3704ebb4e3418743dc3bf70c41
              </div>

              <!-- bottoni per modifica -->
              <div class="modify-order">
                <div class="btn-order" >
                  <div @click="remove(item.id)">
                    <i class="sign-order fa-solid fa-circle-minus"></i>
                  </div> 
                    {{item.quantity}} 
                  <div @click="added(item)">
                    <i class="sign-order fa-solid fa-circle-plus"></i>
                  </div>
                </div>
              </div> 
            </div>

            <!-- consegna -->
            <hr class="mt-3">
            <div class="d-flex justify-content-between">
              <div>
                <b>Consegna</b>
              </div>
              <div>
                {{ this.deliveryPrice }} €
              </div>
            </div>
            <hr class="mt-4">

            <!-- totale -->
            <div class="d-flex justify-content-between">
              <div>
                <b>Totale</b>
              </div>
              <div>
                <b v-if="this.cartTotal">{{ parseFloat(this.cartTotal).toFixed(2) }} €</b>
              </div>
            </div>

            <!-- totale -->
            <button @click="emptyCart">Svuota carrello</button>
          </div>
          <!-- fine carrello con items -->

          <!-- carrello vuoto -->
          <div class="empty_cart" v-else-if="this.cart.length === 0">
            <h3><i class="fa-solid fa-cart-shopping"></i> Il tuo deliveboo</h3>
            <img src="/public/img/logo-white.png" alt="logo deliveboo">
            <p>Non hai ancora aggiunto alcun prodotto. Quando lo farai, compariranno qui!</p>
          </div>
          <!-- fine carrello vuoto -->

          <!-- notifica carrello già pieno -->
          <div v-else class="cart-notification">
            <h3>Vuoi creare un nuovo carrello&quest;</h3>
            <p>In questo modo cancelli il carrello esistente e ne crei uno nuovo.</p>
            <button class="keep-cart-btn" @click="this.requestChangeCart = false">Annulla</button>
            <button class="empty-cart-btn" @click="emptyCart()">Nuovo carrello</button> 
          </div>

          <!-- <div v-if="store.length !== 0 && this.selResId == this.cartResId">
                            <h5 class="card-body px-0 py-2">
                              <strong>Carrello </strong>
                              <span v-if="this.selRes[0] && this.selRes[0].user_id">per {{ this.selRes[0].business_name }}</span>
                            </h5>
                            <button v-if="store.length !== 0" @click="emptyCart">Svuota carrello</button>

                            <ul>
                              <li v-for="item in getItems" class="d-flex justify-content-between align-items-center mb-2">
                                <div>{{ item.name }}</div>
                                <div><button @click="removeOneItem(item.id)">-</button> {{ item.quantity }} <button @click="addOneItem(item.id)">+</button>{{ item.price.toFixed(2) }} €</div>
                              </li>
                            </ul>
                            <hr class="border-top border-dark mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                              <div><b>Totale</b></div>
                              <div><b>{{ store.total.toFixed(2) }} €</b></div>
                            </div>
                          </div>
                          <div v-else-if="this.requestChangeCart == false">
                            CARRELLO VUOTO
                          </div>
                          <div v-else class="cart-notification">
                            Hai già un carrello aperto, vuoi svuotarlo?
                            <button class="empty-cart-btn" @click="emptyCart()">Nuovo carrello</button>
                            <button class="keep-cart-btn" @click="this.requestChangeCart = false">Annulla</button>
                          </div> -->
        </div>

      </div>
    </div>
  </section>
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;

.my_container {
  display: flex;
  flex-wrap: wrap;

  .back-button {
    width: 100%;
    padding-bottom: 30px;

    button {
      &:hover {
        color: #EE5743;
      }
    }
  }
}

// restaurant header
.restaurant_header {
  background-color: #fff;
  border: 1px solid #eaeaea;
  box-shadow: 0px 5px 5px 0px #ececec;
  margin-bottom: 50px;

  .flex-info-res {
    display: flex;
    align-items: center;
    padding: 50px 0;
  }

  .restaurant_image {
    width: 500px;
    border: 1px solid #eaeaea;
    box-shadow: 0px 5px 5px 0px #ececec;
    border-radius: 10px;

    img {
      display: block;
      border-radius: 10px;
    }
  }

  .restaurant_informations {
    padding-left: 50px;
    line-height: 30px;

    svg {
      width: 20px;
      padding-right: 10px;
    }

    .restaurantName {
      font-size: 40px;
      font-weight: 700;
      margin-bottom: 20px;
    }

    .delivery {
      background-color: $btn_red;
      padding: 5px 10px;
      color: #fff;
      border-radius: 10px;
    }
  }
}

// dish menu
.dish_cart {
  display: flex;
  justify-content: space-around;
  background-color: #fff;
  border: 1px solid #eaeaea;
  box-shadow: 0px 5px 5px 0px #ececec;

  .menu-wrapper {
    display: flex;
  }

  .menu_list {
    width: 70%;
    margin-right: 1%;

    .my_Boxes-wrapper {
      display: flex;
      flex-wrap: wrap;
      margin-inline: -10px;

      .box-properties {
        user-select: none;
      }
    }

    .my_bigBox {
      width: calc(100% / 3 - 20px);
      margin: 20px 10px;
      background-color: #fff;
      border: 1px solid #eaeaea;
      box-shadow: 0px 10px 5px 0px #ececec;
      border-radius: 10px;
      display: flex;
      flex-direction: column;

      .info-top {
        flex-grow: 1;
      }

      .my_bigBox-img {
        width: 100%;
        object-fit: cover;
        background-color: white;
        border-top-right-radius: 10px;
        border-top-left-radius: 10px;

        img {
          display: block;
          width: 100%;
          height: 180px;
          object-fit: cover;
          border-top-right-radius: 10px;
          border-top-left-radius: 10px;
        }
      }

      .my_bigBox-info-wrapper {
        padding: 10px;
        line-height: 25px;
        color: #5a5a5a;
        display: flex;
        flex-direction: column;

        .my_bigBox-info-DishName {
          color: $text_black;
          font-size: 14px;
          font-weight: 600;
        }

        .my_bigBox-info-restaurantRating {
          font-size: 12px;
        }

        .my_bigBox-info-OtherDishInfo {
          display: flex;
          flex-direction: column;
          font-size: 12px;
        }
      }

      .pay {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 50px 10px 10px 10px;

        .dishPrice {
          font-size: 15px;
        }

        .addToCart_btn {
          background-color: $btn_red;
          border: 2px solid $btn_red;
          color: #fff;
          padding: 5px;
          border-radius: 8px;

          &:hover {
            background-color: #fff;
            border: 2px solid $btn_red;
            color: $btn_red;
          }
        }

        .fa-cart-shopping {
          margin-right: 10px;
        }
      }

    }

  }

  // regole carrello:
  .cart {
    width: 29%;
    background-color: #F9FAFA;
    border: 1px solid  #eaeaea;
    box-shadow: 0px 5px 5px 0px #ececec;
    border-radius: 10px;
    margin-top: 20px;
    padding: 20px 15px;
    height: 500px;
    overflow-y: auto;

    // modifica quantità
    .modify-cart{
      h3{
        font-weight: bold;
        margin-bottom: 10px;
      }

      .row-order{
        margin-bottom: 10px ;
      }

      button{
        margin-top: 20px;
        width: 100%;
        border: 3px solid $btn_red;
        background-color: #F9FAFA;
        border-radius: 10px;
        color: $btn_red;
        padding: 3px 0;

        &:hover{
          background-color: $btn_red;
          color: #fff;
        }
      }

      // modifica ordini
    .modify-order{
      font-size: 18px;
      display: flex;
      height: 100%;
      align-items: center;

      
      .btn-order{
        display: flex;
        align-items: center;
        width: 70px;
        text-align: left;
        .sign-order{
          color: $btn_red;
          margin: 0 5px;
        }
      }
    }
    }

    // carrello vuoto
    .empty_cart{
      text-align: center;

      h3{
        font-weight: bold;
        opacity: 0.8;
      }

      img{
        width: 200px;
        height: 200px;
        margin: 50px 0;
        padding: 5px;
        filter: grayscale(100%);
        opacity: 0.5;
        border: 1px solid $btn_red;
        border-radius: 50%;
      }

      p{
        font-size: 18px;
        opacity: 0.8;
      }
    }

    // carrello già pieno
    .cart-notification{
      h3{
        font-weight: bold;
        text-align: center;
      }

      p{
        margin: 30px 0;
      }
      .keep-cart-btn, .empty-cart-btn{
        width: calc(100% / 2 - 4px);
        margin-inline: 2px;
        border-radius: 10px;
        padding: 5px 0;
      }

      .keep-cart-btn{
        background-color: #F9FAFA;
        color: $btn_red;
        border: 1px solid $btn_red;

        &:hover{
          border: 2px solid $btn_red;
        }
      }

      .empty-cart-btn{
        background-color: $btn_red ;
        color: #F9FAFA ;
        border: 2px solid $btn_red;

        &:hover{
          background-color: #e96d5d;
        }
      }
    }
  }
}
</style>