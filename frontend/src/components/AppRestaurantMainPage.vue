<script>

export default {
  name: 'AppRestaurantMainPage',
  components: {
    
  }
}
</script>

<template>

<main>
  <!-- restaurant header with image and info-->
  <div class="restaurant_header">

    <div class="restaurant_image"></div>

    <div class="restaurant_informations"></div>

  </div>

  <div class="dish_cart">

      <!-- restaurant menù list-->
    <div class="menu_list">

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
    height: 50vh;
    background-color: $text_black;
    border-bottom-right-radius: 25px;
    border-bottom-left-radius: 25px;

  }

  .dish_cart{
    display: flex;
    justify-content: space-around;
    margin: 40px 0;

    .menu_list{
      width: 65%;
      height: 600px;
      background-color: $text_black;
      border-radius: 25px;

    }

    .cart{
      width: 30%;
      height: 600px;
      background-color: $text_black;
      border-radius: 25px;

    }

  }


}
</style>