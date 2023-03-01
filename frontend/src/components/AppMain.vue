<script>
import AppTrack from './AppTrack.vue';
import AppBannerMain from './AppBannerMain.vue';

export default {
      name: 'AppMain',
      components:{
        AppTrack,
        AppBannerMain 
      }
}

</script>

<template>
      <!-- main section  -->
      <main>
        <AppTrack/>
        <AppBannerMain/>
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
