<script>

export default {
    name: 'AppTrack'
}
</script>

<template>
    <section>
        <div class="my_container">
            <div class="txt">
                <h1>Track orders to your door</h1> 
                <p>
                    Get your favourite food delivered in a flash. You’ll see when your rider’s picked up your order, and be able to follow them along the way. You’ll get a notification when they’re nearby, too.
                </p>

                <!-- buttons sx -->
                <div class="my_buttons">
                    <div class="my_button">
                    <div class="apple">
                        <i class="fa-brands fa-apple"></i>
                    </div>
                    <div class="smaller">Donwload on the <span class="bigger">App Store</span></div>
                </div>

                <div class="my_button">
                    <div class="apple">
                        <i class="fa-brands fa-google-play"></i>
                    </div>
                    <div class="smaller">GET IT ON <span class="bigger">Google Play</span></div>
                </div>
                </div>
                
            </div>

            <div>
                <img src="../../public/img/map-home.webp" alt="">
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
        display: flex;
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
            background-color: #000;
            width: 150px;
            @include flex(flex);
            line-height: 15px;
            margin-right: 15px;
            color: #fff;
            padding: 5px;

            .apple{
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