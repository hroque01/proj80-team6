<script>

export default {
    name: 'AppBannerMain'
}
</script>

<template>
    <section>
        <img src="/img/banner.jpeg" alt="">
        <div class="ms_txt">
            <h1>Fino al 25&percnt; di sconto <span class="noShow-resp">- Meal Deals</span> </h1>
            <p class="noShow-resp">
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
    margin-bottom: 100px;
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

@media only screen and (max-width: 988px) {

    .noShow-resp{
        display: none;
    }

}

@media only screen and (max-width: 922px) {

    section{
        .ms_txt{
            width: 80%;
        }
    }

}

@media only screen and (max-width: 625px) {

    section{
        
        img{
            object-fit: contain;
        }

        .ms_txt{
            h1{
                font-size: 39px;
            }
        }
    }

}

@media only screen and (max-width: 487px) {

    section{
        .ms_txt{
            h1{
                font-size: 29px;
            }
        }
    }

}

@media only screen and (max-width: 361px) {

section{
    .ms_txt{
        h1{
            font-size: 25px;
        }
    }
}

}




</style>