<script>
import AppNavbar from './AppNavbar.vue';
import AppJumbotron from './AppJumbotron.vue';

export default {
  name: 'AppHeader',
  components: {
    AppNavbar,
    AppJumbotron,
  }
}
</script>

<template>
  <header>
    <AppNavbar />
    <div v-if="$route.name === 'home'">
      <AppJumbotron />
    </div>
  </header>
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;

header {
  background-image: url('/img/Jumbotron.png');
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
}

@media only screen and (max-width: 650px) {

  header {
    background-position: -250px;
  }

}



</style>
