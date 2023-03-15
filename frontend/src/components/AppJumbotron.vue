<script>

import { store } from '../store';

export default {
    name: 'AppJumbotron',
    data() {
        return {
            store,
        }
    }
}
</script>

<template>
    <!-- jumbotron-->
    <div class="jumbotron">
        <div class="ms_content">
            <h1>Ristoranti, cibo, takeaway, spesa.
                <br>
                <span>DELIVEBOO</span>
            </h1>
        </div>

        <!-- slider con v-for con immagini -->
        <div class="ms_slider resto-carousel">
            <div class="ms_card" v-for="restaurant in store.restaurants">
                <img :src="'img/img-carousel/' + restaurant" alt="image food">
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;

.jumbotron {
    color: #fff;
    width: 100%;
    height: 500px;
    border-radius: 0;
    position: relative;
    overflow: hidden;

    .ms_content {
        text-align: center;
        position: absolute;
        left: 50%;
        top: 33%;
        transform: translate(-50%, -50%);

        h1 {
            text-align: center;
            color: #fff;
            margin-bottom: 10px;

            span {
                color: $btn-red;
            }
        }
    }

    // slider:
    .ms_slider {
        position: absolute;
        bottom: 45px;
        left: 0;
        display: flex;
        flex-wrap: nowrap;
        animation: scroll 40s linear infinite;

        .ms_card {
            display: inline-block;
            margin-inline: 5px;
            border-radius: 15px;
            width: 200px;
            height: 100px;

            img {
                border-radius: 15px;
            }
        }

        // animazione img:
        @keyframes scroll {
            0% {
                transform: translateX(0%);
            }

            100% {
                transform: translateX(calc(-200px * 4));
                /* multiply the card width by the number of cards */
            }

        }
    }
}
</style>