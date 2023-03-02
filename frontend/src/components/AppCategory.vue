<script>

export default {
    name: 'AppCategory',
    data(){
        return{
            categories: [
                {
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
                }
                
            ]
        }
    }
}
</script>

<template>
    <section>

        <!-- da fare carosello carino caruccio -->
        <div class="my_container">
            <div class="category" v-for="(category, index) in categories" :key="index">
                <img :src="category.img" :alt="category.typeName">
                <span>{{ category.typeName }}</span>
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

    .category{
        width: calc(100% / 4);
        position: relative;

        span{
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