<script>

export default {
  name: 'AppRestaurantMainPage',
  data() {
    return {
        dishes: [
        {
            name: 'DishnamePlaceholder',
            description: 'DishDescriptionPlaceholder',
            price: "prezzo $",
            image: '',
            ingredients: 'IngredientPlaceholder',
            cart:'Ordina',
        },
        {
            name: 'DishnamePlaceholder',
            description: 'DishDescriptionPlaceholder',
            price: "prezzo $",
            image: '',
            ingredients: 'IngredientPlaceholder',
            cart:'Ordina',
        },
        {
            name: 'DishnamePlaceholder',
            description: 'DishDescriptionPlaceholder',
            price: "prezzo $",
            image: '',
            ingredients: 'IngredientPlaceholder',
            cart:'Ordina',
        },
        {
            name: 'DishnamePlaceholder',
            description: 'DishDescriptionPlaceholder',
            price: "prezzo $",
            image: '',
            ingredients: 'IngredientPlaceholder',
            cart:'Ordina',
        },
        {
            name: 'DishnamePlaceholder',
            description: 'DishDescriptionPlaceholder',
            price: "prezzo $",
            image: '',
            ingredients: 'IngredientPlaceholder',
            cart:'Ordina',
        },
        {
            name: 'DishnamePlaceholder',
            description: 'DishDescriptionPlaceholder',
            price: "prezzo $",
            image: '',
            ingredients: 'IngredientPlaceholder',
            cart:'Ordina',
        }],
    }
  },
  components: {
    
  }
}
</script>

<template>

<main>
  <!-- restaurant header with image and info-->
  <div class="restaurant_header">

    <div class="restaurant_image">

    </div>

    <div class="restaurant_informations"></div>

  </div>

  <div class="dish_cart">

      <!-- restaurant menù list-->
    <div class="menu_list">
      
            <div class="my_Boxes-wrapper">

                <div class="my_bigBox box-properties" v-for="(dish, index) in dishes" :key="index">
                    <div class="dishPrice">
                        <span class="Pricebuble"> {{dish.price}} </span> <br>
                        <span></span>
                    </div>
                    <div class="my_bigBox-img">
                        <img src="https://picsum.photos/400/300" alt="">
                    </div>
                    <div class="my_bigBox-info-wrapper">
                        <div class="my_bigBox-info-DishName">{{dish.name}}</div>
                        <div class="my_bigBox-info-OtherDishInfo">
                            <div class="DishDescr">
                                {{ dish.description }}
                            </div>
                            <div class="DishIngredients">
                                {{ dish.ingredients }}
                            </div>
                            <div class="addToCart_btn">{{ dish.cart }}</div>
                        </div>
                    </div>
                </div>

            </div>
    </div>

      <!-- cart right side-->
    <div class="cart">

    </div>

  </div>

</main>

</template>

<style lang="scss">
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;

main{

  .restaurant_header{
    width: 100%;
    height: auto;
    background-color: $restaurant_card_bg;
    border-bottom-right-radius: 25px;
    border-bottom-left-radius: 25px;
    display: flex;
    align-items: center;
    padding: 50px 200px;

    .restaurant_image{
      width: 500px;
      height: 300px;
      background-color: #fff;
      border-radius: 25px;
      overflow: hidden;
    }
  }

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

  .dish_cart{
    margin-left: 50px;
    margin-right: 50px;
    display: flex;
    gap: 50px;
    justify-content: space-around;

    .menu_list{
      background-color: $restaurant_card_bg;
      border-radius: 25px;
      display: flex;
      justify-content: center;
      padding: 20px 10px;

      .my_Boxes-wrapper{

        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 15px;


        .box-properties{
            overflow: hidden;
            user-select: none;
        }

        .box-properties:hover{
            cursor: pointer;
        }

        }

        .my_bigBox{
            width: 300px;
            height: 260px;
            border-radius: 5px;
            overflow: hidden;
            position: relative;

            .my_bigBox-img{
                width: 100%;
                height: 65%;
                overflow: hidden;
            }

            .my_bigBox-info-wrapper{
                width: 100%;
                height: 25%;
                padding: 10px;
                background-color: #fff;
                display: flex;
                flex-direction: column;
                justify-content: center;
                border-bottom-right-radius: 8px;
                border-bottom-left-radius: 8px;

                .my_bigBox-info-DishName{

                    font-size: 14px;
                    font-weight: 600;

                }

                .my_bigBox-info-restaurantRating{

                    font-size: 12px;

                }

                .my_bigBox-info-OtherDishInfo{

                    display: flex;
                    flex-direction: column;
                    font-size: 12px;
                    
                    .addToCart_btn{
                      position: absolute;
                      top: 220px;
                      right: 5px;
                      background-color: aqua;
                      padding: 5px;
                      border-radius: 8px;
                      overflow: hidden;
                      z-index: 9999;
                    }

                }
            }

            .dishPrice{
                position: absolute;
                text-align: center;
                font-size: 12px;
                width: 80px;
                right: 10px;
                top: 155px;
                background-color: aqua;
                padding: 5px 10px;
                border-radius: 50px;
            }

            .my_likeBtn{
                position: absolute;
                right: 15px;
                top: 10px;
            }
        }

    }

    .cart{
      width: 30%;
      height: 600px;
      background-color: $restaurant_card_bg;
      border-radius: 25px;

    }

  }


}
</style>