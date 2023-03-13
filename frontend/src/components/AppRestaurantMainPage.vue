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
    }
  },
  goBack() {
    // Emetti un evento per far sapere al componente padre che l'utente ha cliccato su "Torna indietro"
    this.$emit('go-back');
    // Modifica la variabile "containerVisible" del componente padre per tornare indietro
    this.$emit('update:containerVisible', true);
  },
  computed: {
    filteredRestaurants() {
      return this.restaurants.filter(restaurant => restaurant.id === parseInt(this.$route.params.id));
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
  <router-link to="/">
    Torna indietro
  </router-link>

  <!-- restaurant header with image and info-->
  <div class="restaurant_header" v-for="(restaurant, index) in filteredRestaurants" :key="index">
    <div v-if="restaurant">
      <div class="restaurant_image">
        <img :src="restaurant.image" :alt="restaurant.business_name">
      </div>

      <div class="restaurant_informations">

        <div class="restaurantName">{{ restaurant.business_name }}</div>
        <div class="restaurantAdress">Ci puoi trovare a: {{ restaurant.address }}</div>
        <div class="restaurantDescription">{{ restaurant.description }}</div>
        <div class="restaurantOpeningTimes">
          {{ restaurant.opening_time }} - {{ restaurant.closure_time }}
        </div>
        <div class="restaurantDeliveryPrice">Consegna al costo di: {{ restaurant.delivery_price }} $</div>

      </div>
    </div>
  </div>


  <div class="dish_cart">

    <!-- restaurant menù list-->
    <div class="menu_list">

      <div class="my_Boxes-wrapper">

        <div class="my_bigBox box-properties" v-for="(dish, index) in dishes" :key="index">
          <div class="dishPrice" v-if="dish">
            <span class="Pricebuble"> {{ dish.price }} </span> <br>
            <span></span>
          </div>
          <div class="my_bigBox-img">
            <img :src="dish.image" :alt="dish.name">
          </div>
          <div class="my_bigBox-info-wrapper">
            <div class="my_bigBox-info-DishName">{{ dish.name }}</div>
            <div class="my_bigBox-info-OtherDishInfo">
              <div class="DishDescr">
                {{ dish.description }}
              </div>
              <div class="DishIngredients">
                {{ dish.ingredients }}
              </div>
              <button class="addToCart_btn" @click="addDish(index)">Aggiungi al carrello</button>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- cart right side-->
    <div class="cart">

    </div>

  </div>
</template>

<style lang="scss">
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;


.restaurant_header {
  width: 100%;
  height: auto;
  background-color: $restaurant_main_bg;
  border-bottom-right-radius: 25px;
  border-bottom-left-radius: 25px;
  display: flex;
  padding: 50px 200px;

  margin-bottom: 50px;

  .restaurant_image {
    width: 500px;
    height: 300px;
    background-color: #fff;
    border-radius: 15px;
    overflow: hidden;
  }

  .restaurant_informations {

    padding: 50px;

    .restaurantName {
      font-size: 40px;
      font-weight: 700;
      color: $text_black;
    }

  }
}

.my_boxesTitle-container {

  line-height: 20px;
  margin: 25px 0;

  .my_boxesTitle {
    font-size: 20px;
    font-weight: 600;
  }

  .my_boxesTitle-descr {
    font-size: 15px;
    font-weight: 300;
  }

}

.dish_cart {
  margin-left: 50px;
  margin-right: 50px;
  display: flex;
  gap: 50px;
  justify-content: space-around;

  .menu_list {
    background-color: $restaurant_main_bg;
    border-radius: 15px;
    display: flex;
    justify-content: center;
    padding: 20px 10px;

    .my_Boxes-wrapper {

      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 15px;


      .box-properties {
        overflow: hidden;
        user-select: none;
      }

      .box-properties:hover {
        cursor: pointer;
      }

    }

    .my_bigBox {
      width: 300px;
      height: 260px;
      border-radius: 5px;
      overflow: hidden;
      position: relative;

      .my_bigBox-img {
        width: 100%;
        height: 65%;
        overflow: hidden;
      }

      .my_bigBox-info-wrapper {
        width: 100%;
        height: 25%;
        padding: 10px;
        background-color: #fff;
        display: flex;
        flex-direction: column;
        justify-content: center;
        border-bottom-right-radius: 8px;
        border-bottom-left-radius: 8px;

        .my_bigBox-info-DishName {

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

          .addToCart_btn {
            position: absolute;
            top: 220px;
            right: 5px;
            background-color: aqua;
            padding: 5px;
            border-radius: 8px;
            overflow: hidden;
            z-index: 9999;
          }

        }
      }

      .dishPrice {
        position: absolute;
        text-align: center;
        font-size: 12px;
        width: 80px;
        right: 10px;
        top: 155px;
        background-color: aqua;
        padding: 5px 10px;
        border-radius: 50px;
      }

      .my_likeBtn {
        position: absolute;
        right: 15px;
        top: 10px;
      }
    }

  }

  .cart {
    width: 30%;
    height: 600px;
    background-color: $restaurant_main_bg;
    border-radius: 15px;

  }

}
</style>