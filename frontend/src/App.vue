<script>
import AppHeader from './components/AppHeader.vue';
import AppFooter from './components/AppFooter.vue';
import AppMain from './components/AppMain.vue';
// APP RESTAURANT
import AppRestaurant from './components/AppRestaurant.vue';
// APP CHECKOUT
import AppCheckout from './components/AppCheckout.vue';

export default {
  components: {
    AppHeader,
    AppFooter,
    AppMain,
    // APP RESTAURANT
    AppRestaurant,
    // APP CHECKOUT
    AppCheckout,
  }
}
</script>

<template>
  <AppHeader />
  <AppMain />
  <AppFooter />
  <!-- APP RESTAURANT TEMPORANEO -->
  <AppRestaurant />
  <!-- APP CHECKOUT TEMPORANEO -->
  <AppCheckout />
</template>

<style lang="scss">
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;
</style>
