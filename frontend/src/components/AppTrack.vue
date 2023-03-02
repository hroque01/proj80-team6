<script>

export default {
    name: 'AppTrack',
    data(){
        return{
            img: "img/map-home.webp",
            // bottoni App Store e Google Play:
            buttons: [
                {
                    icon: "fa-brands fa-apple",
                    textSmaller: "Donwload on the ",
                    textBigger: "App Store"
                },
                {
                    icon: "fa-brands fa-google-play",
                    textSmaller: "GET IT ON ",
                    textBigger: "Google Play"
                },
            ]
        }
    }
}
</script>

<template>
    <section>
        <div class="my_container">
            <!-- parte sx -->
            <div class="txt">
                <h1>Track orders to your door</h1> 
                <p>
                    Get your favourite food delivered in a flash. You&#39ll see when your rider&#39s picked up your order, and be able to follow them along the way. You&#39ll get a notification when they&#39re nearby, too.
                </p>

                <!-- bottoni -->
                <div class="my_buttons">
                    <div class="my_button" v-for="(button,index) in buttons" :key="index">
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

section{
    background-color: #f9fafa;
    padding-bottom: 100px ;

    .my_container{
        @include flex(flex);
        border: 1px solid #f0f0f0;
        box-shadow: 0px 20px 10px 0px #b7bec2;

        .txt{
            width: 50%;
            padding: 30px;

            p{
                margin: 20px 0;
            }
        }

        .my_buttons{
            @include flex(flex);
        }
        .my_button{
            width: 150px;
            background-color: #000;
            color: #fff;
            line-height: 15px;
            margin-right: 15px;
            padding: 5px;
            @include flex(flex);

            .ms_icon{
                width: 30px;
                font-size: 30px;
            }

            .smaller{
                font-size: 13px;
                margin-left: 10px;
            }

            .bigger{
                font-size: 18px;
            }
        }
    }
}
</style>