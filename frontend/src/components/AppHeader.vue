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
  <AppNavbar />

  <h1>
    Ciao da APpHeader
  </h1>
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;
</style>
