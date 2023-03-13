<script>
import AppTrack from './AppTrack.vue';
import AppBannerMain from './AppBannerMain.vue';
import AppCategory from './AppCategory.vue';
import AppRestaurant from './AppRestaurant.vue';


export default {
  name: 'AppMain',
  components: {
    AppTrack,
    AppBannerMain,
    AppCategory,
    AppRestaurant,

  }
}

</script>

<template>
  <!-- main section home -->
  <div v-if="$route.name === 'home'">
    <AppTrack />
    <AppBannerMain />
  </div>
  <AppRestaurant />
  <!-- <AppCategory /> -->
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;
</style>
