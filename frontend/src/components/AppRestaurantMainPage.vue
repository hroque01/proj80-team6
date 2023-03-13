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
  <div>
    <router-link to="/">
      Torna indietro
    </router-link>

    <!-- restaurant header with image and info-->
    <div class="restaurant_header" v-for="(restaurant, index) in filteredRestaurants" :key="index">
      <div v-if="restaurant" class="flex-info-res my_container">
        <div class="restaurant_image">
          <img :src="restaurant.image" :alt="restaurant.business_name">
        </div>

        <div class="restaurant_informations">

          <div class="restaurantName">{{ restaurant.business_name }}</div>
          <div>
            <i class="fa-solid fa-location-dot icons-description"></i>{{ restaurant.address }}
          </div>
          <div>
            <i class="fa-solid fa-utensils icons-description"></i>{{ restaurant.description }}
          </div>
          <div>
            <i class="fa-solid fa-clock icons-description"></i>{{ restaurant.opening_time }} - {{ restaurant.closure_time }}
          </div>
          <div>
            <i class="fa-solid fa-motorcycle icons-description"></i>Consegna al costo di: {{ restaurant.delivery_price }} &euro;
          </div>
        </div>
      </div>
    </div>


    <div class="dish_cart">

      <div class="my_container menu-wrapper">

        <!-- restaurant menù list-->
        <div class="menu_list">

          <div class="my_Boxes-wrapper">

            <!-- image -->
            <div class="my_bigBox box-properties" v-for="(dish, index) in dishes" :key="index">
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
          <!-- <hr class="border-top border-dark mb-3">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div>Subtotale</div>
                    <div>21,00 €</div>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div>Spese di consegna</div>
                    <div>5,00 €</div>
                </div> -->
          <hr class="border-top border-dark mb-3">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <div><b>Totale</b></div>
            <div><b>{{ store.total.toFixed(2) }} €</b></div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;

.my_container{
  display: flex;
  padding: 50px 0;
}
// restaurant header
.restaurant_header {
  background-color: #fff;
  border: 1px solid #eaeaea;
  box-shadow: 0px 5px 5px 0px #ececec;
  margin-bottom: 50px;

  .flex-info-res{
    display: flex;
    align-items: center;
    padding: 50px 0;
  }

  .restaurant_image {
    width: 500px;
    height: 300px;
    border: 1px solid #eaeaea;
    box-shadow: 0px 5px 5px 0px #ececec;
    border-radius: 10px;
    overflow: hidden;
  }

  .restaurant_informations {
    padding-left: 50px;

    .icons-description{
      margin-right: 20px;
    }

    .restaurantName {
      font-size: 40px;
      font-weight: 700;
    }
  }
}

// dish menu
.menu-wrapper{
  display: flex;
}
.dish_cart{
  display: flex;
  justify-content: space-around;
  background-color: #fff;
  border: 1px solid #eaeaea;
  box-shadow: 0px 5px 5px 0px #ececec;

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

      .box-properties:hover {
        cursor: pointer;
      }
    }

    .my_bigBox {
      width: calc(100% / 3 - 20px);
      margin: 20px 10px;
      background-color: #fff;
      border: 1px solid #eaeaea;
      box-shadow: 0px 10px 5px 0px #ececec;
      border-radius: 10px;

      .my_bigBox-img {
        width: 100%;
        height: 170px;
        object-fit: cover;
        overflow: hidden;
        border-top-right-radius: 10px;
        border-top-left-radius: 10px;
        background-color: white
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

      .pay{
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;

        .dishPrice {
          font-size: 15px;
        }
        .addToCart_btn {
          background-color: $btn_red;
          border: 1px solid $btn_red;
          color: #fff;
          padding: 5px;
          border-radius: 8px;
        }

        .fa-cart-shopping{
          margin-right: 10px;
        }
      }
      
    }

  }

  .cart {
    width: 300px;
    background-color: $restaurant_main_bg;
    border-radius: 15px;
    padding: 30px;
  }

}
</style>