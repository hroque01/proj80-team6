<script>

import AppHeader from './components/AppHeader.vue';
import AppFooter from './components/AppFooter.vue';
import AppMain from './components/AppMain.vue';
// APP RESTAURANT
import AppRestaurant from './components/AppRestaurant.vue';
import AppDishes from './components/AppDishes.vue';
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
    AppDishes,
    // APP RESTAURANT (MAIN RESTAURANT PAGE)
    AppRestaurantMainPage,
    // APP CHECKOUT
    AppCheckout,
  }
}
</script>

<template>
  <AppHeader />
  <AppMain />

  <!-- APP RESTAURANT TEMPORANEO -->
  <!-- APP RESTAURANT LIST TEMPORANEO -->

  <AppRestaurant />

  <AppDishes />

  <!-- APP RESTAURANT MAIN PAGE TEMPORANEO -->

  <AppRestaurantMainPage />

  <!-- APP CHECKOUT TEMPORANEO -->

  <AppCheckout />
  <AppFooter />
</template>

<style lang="scss">
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;
</style>
