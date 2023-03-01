<script>

export default {
    name: 'AppBannerMain'
}
</script>

<template>
    <section>
        <img src="public/img/banner.jpeg" alt="">
        <div class="ms_txt">
            <h1>Up to 25% off - Meal Deals</h1>
            <p>
                Need a midweek pick-me-up, a break from cooking for the family or just fancy your favourite restaurant?
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