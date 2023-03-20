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
    <footer :class="{ 'margin-bottom': $route.name === 'checkout'} ">
        <div class="my_container">

            <!-- logo -->
            <div class="logo-footer">
                <img src="/public/img/logo-footer-dark.png" alt="logo deliveboo" class="logo">

                <span>Deliveboo - Team 6</span>

                <p>Ciao a tutti&excl; Siamo un gruppo di cinque giovani studenti Boolean che hanno lavorato duramente per
                    portare a termine questo progetto di Deliveboo. Qui troverete il frutto del nostro lavoro e delle nostre
                    idee. Speriamo che il nostro progetto possa ispirarvi e farvi apprezzare la passione che abbiamo messo
                    in esso.</p>
                <p>Qui sotto i link a GitHub dove potrete visionare i nostri progetti.</p>

                <span>&hearts;</span>
            </div>

            <!-- ciclo per cards -->
            <div class="raghiFooter">
                <div class="ciaoRaghi" v-for="card in cards">
                    <div class="card_Rag">
                        <a :href="card.gitHub">
                            <img :src="'/img/' + card.img" :alt="card.name"
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

.margin-bottom{
    margin-top: 50px;
}

footer {
    background-color: #2E3333;
    padding: 50px 0 60PX 0;

    .my_container {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .logo-footer {
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;

        span {
            display: block;
            color: #d0d0d0;
            font-size: 20px;
            margin: 10px 0;
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

        p {
            color: #d0d0d0;
            width: 60%;
            font-size: 14px;
            line-height: 30px;
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
            filter: grayscale(100%);
            opacity: 0.8;

            &:hover {
                transform: scale(1.1);
                filter: grayscale(0%);
                opacity: 1;
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

@media only screen and (max-width: 750px) {

    footer{
        .logo-footer{
            p{
                width: 100%;
            }
        }
    }

}

@media only screen and (max-width: 540px) {

    .raghiFooter{
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;

        .ciaoRaghi{
            width: calc(90% / 2 - 20px);

            .card_Rag {
                
            }
        }
    }

} 

@media only screen and (max-width: 470px) {

    .raghiFooter{
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;

        .ciaoRaghi{
            width: 90%;

            .card_Rag {

                img{
                    object-position: 0px -40px;
                }
                
            }
        }
    }

}

</style>
