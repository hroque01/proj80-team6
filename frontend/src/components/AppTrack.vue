<script>

import { store } from '../store';

export default {
    name: 'AppTrack',
    data() {
        return {
            img: "img/map-home.webp",
            // bottoni App Store e Google Play:
            store,
            // array di immagini per slider
            restaurants:
                [
                    'img/img-carousel/aubergine-pizza.jpg',
                    'img/img-carousel/avocado-toast.jpg',
                    'img/img-carousel/cappuccino.jpg',
                    'img/img-carousel/corona-beer.jpg',
                    'img/img-carousel/donuts.jpg',
                    'img/img-carousel/green-sushi.jpg',
                    'img/img-carousel/hamburger.jpg',
                    'img/img-carousel/macarons.jpg',
                    'img/img-carousel/meat-skewer.jpg',
                    'img/img-carousel/pennette.jpg',
                    'img/img-carousel/round-vegetables.jpg',
                    'img/img-carousel/soup.jpg',
                    'img/img-carousel/spaghetti-chinese.jpg',
                    'img/img-carousel/sushi.jpg',
                    'img/img-carousel/vegetables.jpg',
                ]
        }
    }
}
</script>

<template>
    <section>
        <!-- slider con v-for con immagini -->
        <div class="ms_slider resto-carousel">
            <div class="ms_card" v-for="restaurant in restaurants">
                <img :src="restaurant" alt="image food">
            </div>
        </div>

        <div class="my_container">
            <!-- parte sx -->
            <div class="txt">
                <h1>Traccia gli ordini da casa tua</h1>
                <p>
                    Ricevi il tuo cibo preferito in un lampo. Vedrai quando il tuo rider ha ritirato il tuo ordine e potrai
                    seguirlo lungo il percorso. Riceverai una notifica anche quando sono nelle vicinanze.
                </p>

                <!-- bottoni -->
                <div class="my_buttons">
                    <div class="my_button" v-for="(button, index) in store.buttons" :key="index">
                        <div class="ms_icon">
                            <i :class="button.icon"></i>
                        </div>
                        <div class="smaller">
                            {{ button.textSmaller }}
                            <span class="bigger">{{ button.textBigger }}</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- parte dx -->
            <div>
                <img :src="img" alt="">
            </div>

        </div>
    </section>
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;

section {
    background-color: #f9fafa;
    padding: 220px 0 90px 0;
    position: relative;
    overflow: hidden;

    .my_container {
        @include flex(flex);
        border: 1px solid #f0f0f0;
        box-shadow: 0px 20px 10px 0px #b7bec2;

        .txt {
            width: 50%;
            padding: 30px;

            p {
                margin: 20px 0;
            }
        }

        .my_buttons {
            @include flex(flex);
        }

        .my_button {
            width: 150px;
            background-color: #000;
            color: #fff;
            line-height: 15px;
            margin-right: 15px;
            padding: 5px;
            @include flex(flex);

            .ms_icon {
                width: 30px;
                font-size: 30px;
            }

            .smaller {
                font-size: 13px;
                margin-left: 10px;
            }

            .bigger {
                font-size: 18px;
            }
        }
    }
}

// slider:
.ms_slider {
    position: absolute;
    top: 0;
    left: 0;
    display: flex;
    flex-wrap: nowrap;
    animation: scroll 34s linear infinite;

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
</style>