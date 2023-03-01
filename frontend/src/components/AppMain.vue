<script>
import AppTrack from './AppTrack.vue';
import AppBannerMain from './AppBannerMain.vue';
import AppCategory from './AppCategory.vue';

export default {
  name: 'AppMain',
  components:{
      AppTrack,
      AppBannerMain,
      AppCategory
    }
}

</script>

<template>
    <!-- main section  -->
    <main>
      <AppTrack/>
      <AppBannerMain/>
      <AppCategory/>
    </main>
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;

main {
      margin-top: 90px;

}
</style>
