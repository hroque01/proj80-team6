<script>
import AppCart from './AppCart.vue';
import AppData from './AppData.vue';
import AppPayment from './AppPayment.vue';

export default {
    components: {
        AppCart,
        AppData,
        AppPayment
    }
}
</script>

<template>
    <div class="my_container">
        <h1>
            <router-link to="/cart">Carrello</router-link>
        </h1>

        <h1>
            <router-link to="/data">Dati</router-link>
        </h1>

        <h1>
            <router-link to="/payment">Pagamento</router-link>
        </h1>

        <div class="info">
            <router-view></router-view>
        </div>
    </div>
</template>

<style lang="scss">
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;

.my_container {
    display: flex;
    justify-content: center;
    gap: 30px;
    flex-wrap: wrap;

    .info {
        width: 100%;
    }
}
</style>