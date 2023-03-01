<script>
import AppNavbar from './AppNavbar.vue';

export default {
  name: 'AppHeader',
  components: {
    AppNavbar,
  }
}
</script>

<template>
  <header>
    <AppNavbar />
  </header>
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;

header {
  background-color: #000000;
}
</style>
