<script>
import AppTrack from './AppTrack.vue';
import AppBannerMain from './AppBannerMain.vue';
import AppRestaurant from './AppRestaurant.vue';
import AppCheckout from './AppCheckout.vue';
import AppRestaurantMainPage from './AppRestaurantMainPage.vue';




export default {
  name: 'AppMain',
  components: {
    AppTrack,
    AppBannerMain,
    AppRestaurant,
    AppCheckout,
    AppRestaurantMainPage

  }
}

</script>

<template>
  <!-- main section home -->
  <AppTrack v-if="$route.name === 'home'" />

  <AppBannerMain v-if="$route.name === 'home'" />

  <AppRestaurant v-if="$route.name !== 'cart'" />

  <AppRestaurantMainPage v-if="$route.name === 'restaurant-detail'" />

  <AppCheckout v-if="$route.name === 'cart'" />
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;
</style>
