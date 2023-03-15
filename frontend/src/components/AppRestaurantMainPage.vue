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
    }
  },
  methods: {
    getDishes() {
      axios.get(API_URL + 'restaurant/' + this.$route.params.id)
        .then(res => {

          const data = res.data;
          const success = data.success;
          const response = data.response;

          const dishes = response.dishes;
          const restaurants = response.restaurants;

          if (success) {
            this.dishes = dishes;
            this.restaurants = restaurants;

          }
        })
        .catch(err => console.error(err));
    },
    addDish(id) {

      store.quantity.push(this.dishes[id]);
      const key = 'storedQuantity_' + localStorage.length;
      localStorage.setItem(key, JSON.stringify(this.dishes[id]));

      store.length = localStorage.length;

      const value = localStorage.getItem(key);
      store.item = JSON.parse(value);
    },
    emptyCart() {
      localStorage.clear();
      store.length = 0;
      store.total = 0;
    },
    scrollToTop() {
      window.history.back();
      window.scrollBy(0, -1000);
    }
  },
  computed: {
    filteredRestaurants() {
      return this.restaurants.filter(restaurant => restaurant.id === parseInt(this.$route.params.id));
    },
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
    }
  },
  mounted() {
    this.getDishes();
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

                <button class="addToCart_btn" @click="addDish(index)">
                  <i class="fa-solid fa-cart-shopping"></i>Aggiungi al carrello
                </button>
              </div>
            </div>

          </div>

        </div>

        <!-- cart right side-->
        <div class="cart">
          <h5 class="card-body px-0 py-2">
            <strong>Carrello</strong>
          </h5>
          <button v-if="store.length !== 0" @click="emptyCart">Svuota carrello</button>

          <ul>
            <li v-for="item in getItems" class="d-flex justify-content-between align-items-center mb-2">
              <div>{{ item.quantity }}x {{ item.name }}</div>
              <div>{{ item.price.toFixed(2) }} €</div>
            </li>
          </ul>
          <hr class="border-top border-dark mb-3">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <div><b>Totale</b></div>
            <div><b>{{ store.total.toFixed(2) }} €</b></div>
          </div>
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
    margin-right: 20px;

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

  .cart {
    width: 25%;
    background-color: $restaurant_main_bg;
    border-radius: 15px;
    padding: 25px;
  }

}
</style>