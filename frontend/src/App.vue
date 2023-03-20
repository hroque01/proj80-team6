<script>

import AppHeader from './components/AppHeader.vue';
import AppFooter from './components/AppFooter.vue';
import AppMain from './components/AppMain.vue';

export default {
  components: {
    AppHeader,
    AppFooter,
    AppMain,
  }
}
</script>

<template>
  <AppHeader />

  <main>
    <AppMain />
  </main>

  <AppFooter />
</template>

<style lang="scss">
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;
</style>
