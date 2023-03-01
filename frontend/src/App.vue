<script>
import AppHeader from './components/AppHeader.vue';
import AppFooter from './components/AppFooter.vue';
import AppMain from './components/AppMain.vue';
import AppJumbotron from './components/AppJumbotron.vue';
import AppRestaurant from './components/AppRestaurant.vue';

export default {
  components: {
    AppHeader,
    AppFooter,
    AppMain,
    AppJumbotron,
    AppRestaurant
  }
}
</script>

<template>
  <AppHeader />
  <AppJumbotron />
  <AppMain />
  <AppFooter />
  <!-- APP RESTAURANT TEMPORANEO -->
  <AppRestaurant />
</template>

<style lang="scss">
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;
</style>
