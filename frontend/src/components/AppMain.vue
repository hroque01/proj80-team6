<script>
import AppTrack from './AppTrack.vue'

export default {
      name: 'AppMain',
      components:{
        AppTrack
      }
}

</script>

<template>
      <!-- main section  -->
      <main>
        <AppTrack/>
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
