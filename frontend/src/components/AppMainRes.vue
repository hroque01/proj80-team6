<script>
export default {
    name: 'AppMainRes',
    data() {
    return {
        tags: [ 
        {
            name: '[tagname]',
            img: '',
        },
        {
            name: '[tagname]',
            img: '',
        },
        {
            name: '[tagname]',
            img: '',
        },
        {
            name: '[tagname]',
            img: '',
        },
        {
            name: '[tagname]',
            img: '',
        },
        {
            name: '[tagname]',
            img: '',
        },
        {
            name: '[tagname]',
            img: '',
        }],
        restaurants: [
        {
            name: 'DishnamePlaceholder',
            address: 'AddressPlaceholder',
            delivery_price: "DPH $",
            image: '',
        },
        {
            name: 'DishnamePlaceholder',
            address: 'AddressPlaceholder',
            delivery_price: "DPH $",
            image: '',
        },
        {
            name: 'DishnamePlaceholder',
            address: 'AddressPlaceholder',
            delivery_price: "DPH $",
            image: '',
        },
        {
            name: 'DishnamePlaceholder',
            address: 'AddressPlaceholder',
            delivery_price: "DPH $",
            image: '',
        },
        {
            name: 'DishnamePlaceholder',
            address: 'AddressPlaceholder',
            delivery_price: "DPH $",
            image: '',
        },
        {
            name: 'DishnamePlaceholder',
            address: 'AddressPlaceholder',
            delivery_price: "DPH $",
            image: '',
        }],
    }
  },
}

</script>

<template>
    <div class="my_container restaurants_box">

        <!-- TagBoxes -->
        <div class="tagsContainer">
            <div class="mainTitle-container">
                <span class="mainTitle">Tipi di ristoranti</span>
            </div>
            <div class="tagWrapper">
            
                <div class="tag wrapperProperties" v-for="(tag, index) in tags" :key="index">
                    <div class="tagBox-img">
                        <img src="https://picsum.photos/100/100" alt="">
                    </div>
                    <div class="tagBox-name">{{ tag.name }}</div>
                </div>

            </div>
        </div>
        

        <!-- Restaurant List -->
        <div class="restaurantsContainer">

            <div class="mainTitle-container">
                <span class="mainTitle">Lista dei ristoranti</span> <br>
                <span class="mainTitle-descr">Dai un'occhiata alla nostra selezione</span>
            </div>

            <div class="restaurantWrapper">
                
                <div class="restaurant wrapperProperties" v-for="(restaurant, index) in restaurants" :key="index">
                    <div class="deliveryPrice"> {{ restaurant.delivery_price }} </div>
                    <div class="restaurant-img">
                        <img src="https://picsum.photos/400/300" alt="">
                    </div>
                    <div class="restaurant-info-wrapper">
                        <div class="restaurant-info-restaurantName">{{ restaurant.name }}</div>
                        <div class="restaurant-info-address">{{ restaurant.address }}</div>
                    </div>
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
        .mainTitle-container{

            line-height: 20px;
            margin: 25px 50px;
            .mainTitle{
                font-size: 20px;
                font-weight: 600;
            }

            .mainTitle-descr{
                font-size: 15px;
                font-weight: 300;
            }
        
        }

        //Boxes wrapper and box properties
        .restaurantWrapper{

            display: flex;
            flex-wrap: wrap;
            margin-left: 50px;
            margin-right: 50px;

            .wrapperProperties{
                display: flex;
                flex-direction: column;
                overflow: hidden;
                margin-right: 10px;
                margin-bottom: 10px;
                user-select: none;
            }

            .wrapperProperties:hover{
                cursor: pointer;
            }

        }

  

    // tagBoxes

    .tagWrapper{
        display: flex;
        flex-wrap: wrap;
        margin-left: 50px;
        margin-right: 50px;
        gap: 15px;
    }

        .tag{
            width: 100px;
            height: 80px;
            border-radius: 5px;

            .tagBox-img{
                width: 100%;
                height: 70%;
                overflow: hidden;
            }

            .tagBox-name{
                display: flex;
                align-items: center;
                width: 100%;
                height: 30%;
                padding-left: 5px;
                font-size: 12px;
                background-color: $restaurant_card_bg;
            }
        }

    }
        
    // lpBoxes

    .restaurantsContainer{
        flex-direction: row;

    }

    .restaurant{
            width: 270px;
            height: 230px;
            border-radius: 5px;
            overflow: hidden;
            position: relative;

            .restaurant-img{
                width: 100%;
                height: 65%;
                overflow: hidden;
            }

            .restaurant-info-wrapper{
                width: 100%;
                height: 35%;
                padding: 10px;
                background-color: $restaurant_card_bg;
                display: flex;
                flex-direction: column;
                justify-content: center;

                .restaurant-info-restaurantName{

                    font-size: 14px;
                    font-weight: 600;

                }

                .restaurant-info-address{

                    display: flex;
                    align-items: center;

                    .my_otherInfo{
                        font-size: 12px;
                    }

                }
            }

            .deliveryPrice{
                position: absolute;
                text-align: center;
                font-size: 12px;
                width: 80px;
                right: 10px;
                bottom: 65px;
                background-color: white;
                padding: 5px 10px;
                border-radius: 50px;
            }
        }
</style>