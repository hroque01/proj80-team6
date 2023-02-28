<script>
import AppHeader from './components/AppHeader.vue';
export default {
  components: {
    AppHeader,
  }
}
</script>

<template>
  <AppHeader />
</template>

<style lang="scss">
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;
</style>
