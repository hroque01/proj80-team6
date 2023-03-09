<script>

import axios from 'axios';

const API_URL = 'http://localhost:8000/api/v1/';

export default {
    name: 'AppCategory',
    data(){
        return{
            typologies: [
                /* {
                    img: 'img/hamburger.jpg',
                    typeName: 'Hamburgers'
                },
                {
                    img: 'img/chinese.jpg',
                    typeName: 'Chinese'
                },
                {
                    img: 'img/greek.jpg',
                    typeName: 'Greek'
                },
                {
                    img: 'img/indian.jpg',
                    typeName: 'Indian'
                },
                {
                    img: 'img/italian.jpg',
                    typeName: 'Italian'
                },
                {
                    img: 'img/mexican.jpg',
                    typeName: 'Mexican'
                },
                {
                    img: 'img/pizza.jpg',
                    typeName: 'Pizza'
                },
                {
                    img: 'img/sushi.jpg',
                    typeName: 'Sushi'
                },
                {
                    img: 'img/sweet.jpg',
                    typeName: 'Sweets'
                },
                {
                    img: 'img/vegetarian.jpg',
                    typeName: 'Vegan'
                },
                {
                    img: 'img/kebab.jpg',
                    typeName: 'Hamburgers'
                },
                {
                    img: 'img/breakfast.jpg',
                    typeName: 'Breakfast'
                },
                {
                    img: 'img/fish.jpg',
                    typeName: 'Fish'
                } */
            ]
        }
    },

methods: {

  updateTypologies() {
    axios.get(API_URL + 'typology/all')
      .then(res => {

        const data = res.data;
        const success = data.success;
        const response = data.response;

        const typologies = response.typologies;

        /* const dishes = response.dishes; */

        if (success) {
          this.typologies = typologies;
        }
      })
      .catch(err => console.error(err));
  }, 

},

mounted() {
  this.updateTypologies();
},
}
</script>

<template>
    <section>

        <!-- da fare carosello carino caruccio -->
        <div class="my_container">
            <div class="typology" v-for="(typology, index) in typologies" :key="index">
                <img :src="typology.image" :alt="typology.name">
                <a href="">{{ typology.name }}</a>
            </div>
            
        </div>
    </section>
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;

section{
    margin: 100px 0;
}
.my_container{
    display: flex;
    flex-wrap: wrap;

    .typology{
        width: calc(100% / 4);
        position: relative;

        a{
            color: #fff;
            font-weight: bolder;
            position: absolute;
            bottom: 0;
            right: 50%;
            transform: translate(0, -50%);
        }
    }
}
</style>