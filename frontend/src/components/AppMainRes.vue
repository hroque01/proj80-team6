<script>
export default {
    name: 'AppMainRes',
}

</script>

<template>
    <div class="my_container restaurants_box">

        <!-- TagBoxes -->
        <div class="my_tagBoxes">
            <div class="my_boxesTitle-container">
                <span class="my_boxesTitle">Ristoranti che consegnano a [placeholder]</span>
            </div>
            <div class="my_Boxes-wrapper">
            
            <div class="my_tagBox box-properties">
                <div class="tagBox-img">
                    <img src="https://picsum.photos/100/100" alt="">
                </div>
                <div class="tagBox-name">[Tagname]</div>
            </div>
            <div class="my_tagBox box-properties">
                <div class="tagBox-img">
                    <img src="https://picsum.photos/100/100" alt="">
                </div>
                <div class="tagBox-name">[Tagname]</div>
            </div>
            <div class="my_tagBox box-properties">
                <div class="tagBox-img">
                    <img src="https://picsum.photos/100/100" alt="">
                </div>
                <div class="tagBox-name">[Tagname]</div>
            </div>
            <div class="my_tagBox box-properties">
                <div class="tagBox-img">
                    <img src="https://picsum.photos/100/100" alt="">
                </div>
                <div class="tagBox-name">[Tagname]</div>
            </div>
            <div class="my_tagBox box-properties">
                <div class="tagBox-img">
                    <img src="https://picsum.photos/100/100" alt="">
                </div>
                <div class="tagBox-name">[Tagname]</div>
            </div>
            <div class="my_tagBox box-properties">
                <div class="tagBox-img">
                    <img src="https://picsum.photos/100/100" alt="">
                </div>
                <div class="tagBox-name">[Tagname]</div>
            </div>

            </div>
        </div>
        

        <!-- Partners -->
        <div class="my_lpBoxes">
            <div class="my_boxesTitle-container">
                <span class="my_boxesTitle">I partner più amati</span> <br>
                <span class="my_boxesTitle-descr">Aggiunti ai preferiti da altri clienti ❤️</span>
            </div>
            <div class="my_Boxes-wrapper">
                <div class="my_lpBox box-properties">

                </div>
            </div>
        </div>
        



        <!-- MostVoted -->

        <div class="my_mvBoxes">
            <div class="my_boxesTitle-container">
                <span class="my_boxesTitle">I più votati</span>
            </div>
            <div class="my_Boxes-wrapper">
                <div class="my_mvBox box-properties">

                </div>
            </div>
        </div>
        




    </div>
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;

.restaurants_box{

    //general
        //Boxes title
        .my_boxesTitle-container{

            line-height: 20px;
            margin: 25px 0;
            .my_boxesTitle{
                font-size: 20px;
                font-weight: 600;
            }

            .my_boxesTitle-descr{
                font-size: 15px;
                font-weight: 300;
            }
        
        }

        //Boxes wrapper and box properties
        .my_Boxes-wrapper{

            display: flex;
            overflow-x: auto;

            .box-properties{
                display: flex;
                flex-direction: column;
                overflow: hidden;
                margin-right: 10px;
            }

        }

  

    // tagBoxes
        .my_tagBox{
            width: 100px;
            height: 80px;
            border-radius: 5px;

            .tagBox-img{
                width: 100%;
                height: 70%;
                overflow: hidden;
            }

            .tagBox-name{
                width: 100%;
                height: 30%;
                padding-left: 5px;
                font-size: 12px;
                background-color: aquamarine;
            }
        }
    

    // lpBoxes

    

    // mvBoxes

}
</style>