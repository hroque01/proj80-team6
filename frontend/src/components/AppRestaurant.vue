<script>
import AppNavRes from './AppNavRes.vue';
import AppMainRes from './AppMainRes.vue';

export default {
  components: {
    AppNavRes,
    AppMainRes
  }
}
</script>

<template>
  <AppNavRes />
  <AppMainRes />
</template>

<style lang="scss">
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;
</style>