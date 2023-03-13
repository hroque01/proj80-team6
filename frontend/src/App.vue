<script>

import AppHeader from './components/AppHeader.vue';
import AppFooter from './components/AppFooter.vue';
import AppMain from './components/AppMain.vue';
// APP RESTAURANT
// APP RESTAURANT (MAIN RESTAURANT PAGE)
// import AppRestaurantMainPage from './components/AppRestaurantMainPage.vue';
// APP CHECKOUT
import AppCheckout from './components/AppCheckout.vue';

export default {
  components: {
    AppHeader,
    AppFooter,
    AppMain,
    // APP RESTAURANT (MAIN RESTAURANT PAGE)
    // AppRestaurantMainPage,
    // APP CHECKOUT
    AppCheckout,
  }
}
</script>

<template>
  <AppHeader />

  <main>
    <AppMain />

    <div v-if="$route.name === 'cart'">
      <AppCheckout />
    </div>
  </main>

  <AppFooter />
</template>

<style lang="scss">
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;
</style>
