<script>

export default {
    name: 'AppCategory',
    data(){
        return{
            categories: [
                'img/chinese.jpg',
                'img/greek.jpg',
                'img/hambugers.jpg',
                'img/indian.jpg',
                'img/italian.jpg',
                'img/kebab.jpg',
                'img/mexican.jpg',
                'img/pizza.jpg',
                'img/sushi.jpg',
                'img/sweet.jpg',
                'img/vegetarian.jpg',
                'img/breakfast.jpg',
            ]
        }
    }
}
</script>

<template>
    <section>
        <div class="my_container">
            <div class="category" v-for="category in categories">
                <img :src="category" alt="">
            </div>
            
        </div>
    </section>
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;

.category{
    @include flex(flex);
}
</style>