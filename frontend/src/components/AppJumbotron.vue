<script>
import AppJumbotron from './AppJumbotron.vue';

export default {
    name: 'AppJumbotron',
    components: {
        AppJumbotron,
    }
}
</script>

<template>
    <h1>
        Ciao da AppJumbotron
    </h1>
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;
</style>