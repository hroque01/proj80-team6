<script>
export default {
    name: 'AppJumbotron',
    data() {
        return {
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
    <!-- classe da togliere quando avremo il vero jumbotron, o forse no -->
    <div class="jumbotron">
        <div class="ms_content">
            <h1>Restaurant, food, takeaway, grocery. <span>Delivered</span>.</h1>
            <label for="">Enter your address to see what we deliver</label>
            <input type="text" placeholder="es. Via di Boolean classe 80" name="">
            <input type="submit" value="Search" class="search">
        </div>

        <!-- slider con img ristoranti: qui poi creerò in data un array di img e userò un v-for -->
        <div class="ms_slider resto-carousel">
            <div class="ms_card" v-for="restaurant in restaurants">
                <img :src="restaurant" alt="">
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
    height: 440px;
    background-color: #000;
    position: relative;
    border-radius: 0;

    .ms_content {
        text-align: center;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);

        h1 {
            text-align: center;
            color: #fff;
            margin-bottom: 10px;

            span {
                color: $btn-red;
            }
        }

        label {
            display: block;
        }

        input {
            margin-top: 10px;
            width: 400px;
            padding: 10px;
            border-radius: 20px;
        }

        .search {
            width: 100px;
            margin-left: 10px;
            background-color: $btn-red;
            border: 1px solid $btn-red;
            color: #fff;
        }
    }

    // slider:
    .ms_slider {
        position: absolute;
        bottom: -50px;
        left: 0;
        display: flex;
        flex-wrap: nowrap;
        animation: scroll 30s linear infinite;

        .ms_card {
            display: inline-block;
            background-color: $btn_red;
            margin-inline: 10px;
            border-radius: 15px;
            width: 200px;
            height: 100px;
        }

        // animazione img:
        @keyframes scroll {
            0% {
                transform: translateX(0%);
            }

            100% {
                transform: translateX(-100%);
            }
        }
    }




}
</style>