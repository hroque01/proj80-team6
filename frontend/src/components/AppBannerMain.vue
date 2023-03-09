<script>

export default {
    name: 'AppBannerMain'
}
</script>

<template>
    <section>
        <img src="/img/banner.jpeg" alt="">
        <div class="ms_txt">
            <h1>Fino al 25&percnt; di sconto - Meal Deals</h1>
            <p>
                Hai bisogno di uno spuntino, di una pausa dal preparare del cibo per la tua famiglia o semplicemente mangiare nel tuo ristorante preferito?
            </p>
        </div>
    </section>
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;

section{
    position: relative;

    .ms_txt{
        position: absolute;
        text-align: center;
        color: #fff;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);

        h1{
            font-size: 50px;
            margin-bottom: 20px;
            font-weight: bolder;
        }
    }
}
</style>