<script>

import { store } from '../store';

export default {
    name: 'AppFooter',
    data() {
        return {
            cards: [
                {
                    img: "marco.jpg",
                    name: "MARCO CELEGATO",
                    gitHub: "https://github.com/codingcele",
                },
                {
                    img: "valerio.jpg",
                    name: "VALERIO LOCCI",
                    gitHub: "https://github.com/Valee8",
                },
                {
                    img: "romina.png",
                    name: "ROMINA MALIMBAN",
                    gitHub: "https://github.com/RominaMalimban",
                },
                {
                    img: "davide.jpeg",
                    name: "DAVIDE PIRODDI",
                    gitHub: "https://github.com/0Daviduo0",
                },
                {
                    img: "hadson.jpg",
                    name: "HADSON ROQUE",
                    gitHub: "https://github.com/hroque01",
                }
            ]
        }
    }
}
</script>

<template>
    <!-- Footer -->
    <footer>
        <div class="my_container">

            <!-- logo -->
            <div class="logo-footer">
                <img src="/public/img/logo-footer-dark.png" alt="logo deliveboo" class="logo">

                <span>Deliveboo - Team 6</span>
            </div>

            <!-- ciclo per cards -->
            <div class="raghiFooter">
                <div class="ciaoRaghi" v-for="card in cards">
                    <div class="card_Rag">
                        <a :href="card.gitHub">
                            <img :src="'/public/img/' + card.img" :alt="card.name"
                                :class="card.name === 'ROMINA MALIMBAN' ? 'romina' : ''">
                            <span>{{ card.name }}</span>
                        </a>
                    </div>
                </div>
            </div>


        </div>
    </footer>
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;

footer {
    background-color: #2E3333;
    padding: 50px 0;

    .my_container {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .logo-footer {
        text-align: center;

        span {
            display: block;
            color: #d0d0d0;
            font-size: 20px;
            margin: 30px 0;
            font-weight: bold;
            font-style: italic;
        }

        .logo {
            width: 70px;
            height: 70px;
            object-fit: contain;
            border-radius: 50%;
            padding: 2px;
            border: 2px solid $btn_red;
        }
    }
}

.raghiFooter {
    display: flex;

    .ciaoRaghi {

        width: calc(100% / 5 - 20px);
        margin: 10px;
        height: 200px;
        border-radius: 10px;


        .card_Rag {
            transition: all .2s ease-in-out;

            &:hover {
                transform: scale(1.1);
            }
        }

        a {
            color: #d0d0d0;
            font-weight: bold;
        }

        img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }

        .romina {
            object-position: 30% top;
        }

        span {
            display: block;
            margin-top: 10px;
            text-align: center;
        }
    }
}
</style>
