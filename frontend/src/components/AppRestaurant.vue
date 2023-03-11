<script>

import axios from 'axios';

const API_URL = 'http://localhost:8000/api/v1/';

export default {
    name: 'AppRestaurant',
    data() {
        return {
            typologies: [],
            restaurants: [],
            // proprietà con array che conterrà le tipologie selezionate dall'utente:
            selectedTypologies: []
        };
    },

    // METODI:
    methods: {
        updateTypologies() {
            axios.get(API_URL + 'restaurant/filtered', {
                params: {
                    typologies: this.selectedTypologies
                }
            })
                .then(res => {
                    const data = res.data;
                    const success = data.success;
                    const response = data.response;

                    const typologies = response.typologies;
                    const restaurants = response.restaurants;

                    if (success) {
                        this.typologies = typologies;
                        this.restaurants = restaurants;
                    }
                })
                .catch(err => console.error(err));
        }
    },
    computed: {
        // metodo che filtra i ristoranti in base alle tipologie selezionate dall'utente.
        filteredRestaurants() {

            // variabile con lista completa di tutti i ristoranti:
            let filteredRestaurants = this.restaurants;

            // condizione: se utente ha selezionato almeno una tipologia, mi restituisce con il filter solo ristoranti    
            //  che corrispondono ai criteri di selezione: ALMENO una tipologia
            if (this.selectedTypologies.length > 0) {
                filteredRestaurants = filteredRestaurants.filter(restaurant => {
                    return restaurant.typologies.some(typology => {
                        return this.selectedTypologies.includes(typology.id);
                    });
                });
            }
            return filteredRestaurants;
        }
    },
    mounted() {
        this.updateTypologies();
    }
};
</script>

<template>
    <!-- div container -->

    <div class="my_container">
        <div class="restaurantFilter">

            <!-- Navbar laterale a sinistra - elenco categorie -->
            <nav>

                <h4>Categorie</h4>
                <ul>
                    <li>
                        <div v-for="typology in typologies" :key="typology.id">
                            <input type="checkbox" name="" :id="'typology_' + typology.id" v-model="selectedTypologies"
                                :value="typology.id">
                            <label :for="'typology_' + typology.id">{{ typology.name }}</label>
                        </div>
                    </li>
                </ul>
            </nav>


            <div class="my_container restaurants_box">

                <!-- Restaurant List -->
                <div class="restaurantsContainer">

                    <div class="mainTitle-container">
                        <span class="mainTitle">Lista dei ristoranti</span> <br>
                        <span class="mainTitle-descr">Dai un'occhiata alla nostra selezione</span>
                    </div>

                    <div class="restaurantWrapper">

                        <div class="restaurant wrapperProperties" v-for="restaurant in filteredRestaurants"
                            :key="restaurant.id">

                            <div class="deliveryPrice"> {{ restaurant.delivery_price }} </div>
                            <div class="restaurant-img">
                                <img src="https://picsum.photos/400/300" alt="">
                            </div>
                            <div class="restaurant-info-wrapper">
                                <div class="restaurant-info-restaurantName">{{ restaurant.business_name }}</div>
                                <div class="restaurant-info-address">{{ restaurant.address }}</div>
                            </div>

                            <!-- <router-link :to="{ name: 'dish-detail', params: { id: restaurant.id } }">Vai qui</router-link> -->


                        </div>

                    </div>
                </div>
                <!-- chiusura restaurant list -->

            </div>
            <!-- chiusura restaurant box -->

        </div>
    </div>
    <!-- chiusura div container -->
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;

.restaurantFilter {
    @include flex(flex);
}

nav {
    height: 100vh;
    overflow: auto;
    width: 300px;
    padding: 20px;
    border: 1px solid #eaeaea;
    border-radius: 10px;
    box-shadow: 0px 20px 5px 0px #ececec;

    ul {
        li {
            padding: 15px;
            line-height: 80px;
        }
    }

    input[type=checkbox] {
        width: 20px;
        height: 20px;
        margin-right: 10px;
        border: 1px solid $btn_red;
    }
}

.restaurants_box {
    height: 100vh;
    overflow-y: auto;

    //general
    //Boxes title
    .mainTitle-container {
        line-height: 20px;
        margin: 25px 50px;

        .mainTitle {
            font-size: 20px;
            font-weight: 600;
        }

        .mainTitle-descr {
            font-size: 15px;
            font-weight: 300;
        }

    }

    //Boxes wrapper and box properties
    .restaurantWrapper {

        display: flex;
        flex-wrap: wrap;
        margin-left: 50px;

        .wrapperProperties {
            display: flex;
            flex-direction: column;
            overflow: hidden;
            margin-right: 10px;
            margin-bottom: 10px;
            user-select: none;
        }

        .wrapperProperties:hover {
            cursor: pointer;
        }

    }



    // tagBoxes

    .tagWrapper {
        display: flex;
        flex-wrap: wrap;
        margin-left: 50px;
        margin-right: 50px;
        gap: 15px;
    }

    .tag {
        width: 100px;
        height: 80px;
        border-radius: 5px;

        .tagBox-img {
            width: 100%;
            height: 70%;
            overflow: hidden;
        }

        .tagBox-name {
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

.restaurantsContainer {
    flex-direction: row;

}

.restaurant {
    width: 270px;
    height: 230px;
    border-radius: 5px;
    overflow: hidden;
    position: relative;



    .restaurant-img {
        width: 100%;
        height: 65%;
        overflow: hidden;
    }

    .restaurant-info-wrapper {
        width: 100%;
        height: 35%;
        padding: 10px;
        background-color: $restaurant_card_bg;
        display: flex;
        flex-direction: column;
        justify-content: center;

        .restaurant-info-restaurantName {

            font-size: 14px;
            font-weight: 600;

        }

        .restaurant-info-address {

            display: flex;
            align-items: center;

            .my_otherInfo {
                font-size: 12px;
            }

        }
    }

    .deliveryPrice {
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