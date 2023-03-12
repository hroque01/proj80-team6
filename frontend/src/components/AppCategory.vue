<script>

import axios from 'axios';

const API_URL = 'http://localhost:8000/api/v1/';

export default {
    name: 'AppCategory',
    data(){
        return{
            typologies: []
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

                if (success) {
                this.typologies = typologies;
                }
            })
            .catch(err => console.error(err));
        }
    },
    mounted() {
        this.updateTypologies();
    }
}
</script>

<template>
    <section>

        <!-- da fare carosello carino caruccio -->
        <div class="my_container">

            <div class="typologies">
                <div class="typology" v-for="(typology, index) in typologies" :key="index">
                    <img :src="typology.image" :alt="typology.name">
                    <a href="">{{ typology.name }}</a>
                </div>
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

    .typologies{
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
}

</style>