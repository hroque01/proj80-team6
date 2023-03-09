<script>

import axios from 'axios';

const API_URL = 'http://localhost:8000/api/v1/';

import AppHeader from './components/AppHeader.vue';
import AppFooter from './components/AppFooter.vue';
import AppMain from './components/AppMain.vue';
// APP RESTAURANT
import AppRestaurant from './components/AppRestaurant.vue';
// APP RESTAURANT (MAIN RESTAURANT PAGE)
import AppRestaurantMainPage from './components/AppRestaurantMainPage.vue';
// APP CHECKOUT
import AppCheckout from './components/AppCheckout.vue';

export default {
  components: {
    AppHeader,
    AppFooter,
    AppMain,
    AppRestaurant,
    // APP RESTAURANT (MAIN RESTAURANT PAGE)
    AppRestaurantMainPage,
    // APP CHECKOUT
    AppCheckout,
  },

  data() {

    return {

      restaurants: [],
      restaurants_bk: [],

    }
  },

  methods: {

    updateRestaurants() {
      axios.get(API_URL + 'restaurant/all')
        .then(res => {

          const data = res.data;
          const success = data.success;
          const response = data.response;

          const restaurants = this.restaurants_bk = response.restaurants;

          const dishes = response.dishes;

          if (success) {
            this.restaurants = restaurants;
          }
        })
        .catch(err => console.error(err));
    }, 

  },

  mounted() {
    this.updateRestaurants();
  },

};
</script>

<template>
  <AppHeader />
  <AppMain />

  <!-- APP RESTAURANT TEMPORANEO -->
  <!-- APP RESTAURANT LIST TEMPORANEO -->

  <AppRestaurant />

  <!-- APP RESTAURANT MAIN PAGE TEMPORANEO -->

  <AppRestaurantMainPage />

  <!-- APP CHECKOUT TEMPORANEO -->

  <AppCheckout />
  <AppFooter />

    <!-- <div>

      <h1>
        Restaurants:
      </h1>

      <ul>
        
        <li v-for="restaurant in restaurants" :key="restaurant.id">

          {{ restaurant.business_name }}

        </li>

      </ul>

    </div> -->

</template>

<style lang="scss">
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;
</style>
