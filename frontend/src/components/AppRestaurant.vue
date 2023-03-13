<script>

import AppRestaurantMainPage from './AppRestaurantMainPage.vue';

import axios from 'axios';
import { store } from '../store';

const API_URL = 'http://localhost:8000/api/v1/';

export default {
    name: 'AppRestaurant',
    components: {
        AppRestaurantMainPage,
    },
    data() {
        return {
            store,
            typologies: [],
            restaurants: [],
            selectedTypologies: [], // proprietà con array che conterrà le tipologie selezionate dall'utente:
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
        },
        // metodo per filtrare ristoranti cliccando su immagini: imposto prima la proprietà selectedTypologies su un array contenente solo l'ID della tipologia selezionata dall'utente e poi uso il filtro
        filterRestaurants(typologyId) {
            this.selectedTypologies = [typologyId];
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
    <section>

        <!-- div container -->
        <div class="my_container" v-if="$route.name === 'home'">

            <div class="restaurantFilter">

                <!-- Navbar laterale a sinistra - elenco categorie -->
                <nav>
                    <!-- forse da cancellare le checkboxes e fare filtro con immagini -->
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

                <!-- parte dx -->
                <div class="my_container restaurants_box">

                    <!-- Carosello  -->
                    <div class="typologies">
                        <!-- filtro su immagini al click -->
                        <div class="typology" v-for="(typology, index) in typologies" :key="index">
                            <img :src="typology.image" :alt="typology.name">
                            <div class="typologyTag" @click.prevent="filterRestaurants(typology.id)">{{ typology.name }}
                            </div>
                        </div>

                        <i class="fa-solid fa-arrow-right" @click="change()"></i>
                    </div>

                    <!-- Restaurant List -->
                    <div class="restaurantsContainer">

                        <div class="mainTitle-container">
                            <span class="mainTitle">Lista dei ristoranti</span> <br>
                            <span class="mainTitle-descr">Dai un'occhiata alla nostra selezione</span>
                        </div>

                        <div class="restaurantWrapper">

                            <div class="restaurant wrapperProperties" v-for="restaurant in filteredRestaurants"
                                :key="restaurant.id">

                                <div class="deliveryPrice"> {{ restaurant.delivery_price }} &euro; </div>
                                <div class="restaurant-img">
                                    <img :src="restaurant.image" alt="">
                                </div>
                                <div class="restaurant-info-wrapper">
                                    <div class="restaurant-info-restaurantName">{{ restaurant.business_name }}</div>
                                    <div class="restaurant-info-address">
                                        <i class="fa-solid fa-location-dot"></i>{{ restaurant.address }}
                                    </div>
                                </div>

                                <router-link :to="{ name: 'restaurant-detail', params: { id: restaurant.id } }">Vedi info
                                    ristorante</router-link>

                            </div>

                        </div>
                    </div>
                    <!-- chiusura restaurant list -->

                </div>
                <!-- chiusura restaurant box -->

            </div>
        </div>
        <!-- chiusura div container -->
    </section>

    <div v-if="$route.name === 'restaurant-detail'">
        <AppRestaurantMainPage />
    </div>
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;


.my_container {
    overflow-x: hidden;
    position: relative;
}

section {
    margin: 100px 0;

    // carosello:
    .typologies {
        width: calc(130px * 13);


        .typology {
            display: inline-block;
            width: 120px;
            border: 1px solid #eaeaea;
            border-radius: 10px;
            box-shadow: 0px 5px 5px 0px #ececec;
            // debug
            margin: 5px;

            img {
                border-top-right-radius: 10px;
                border-top-left-radius: 10px;
            }

            .typologyTag {
                font-size: 15px;
                color: $text_black;
                text-align: center;
                padding: 5px;
                cursor: pointer;
            }
        }

        .fa-arrow-right {
            position: absolute;
            right: 0;
            top: 40px;
            font-size: 20px;
            color: $btn_red;
            background-color: #fff;
            padding: 10px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
        }
    }

    .restaurantFilter {
        @include flex(flex);
    }
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
            line-height: 50px;
        }
    }

    input[type=checkbox] {
        width: 20px;
        height: 20px;
        margin-right: 10px;
    }
}

// regole parte dx main
.restaurants_box {
    height: 100vh;
    overflow-y: auto;

    //general
    //Boxes title
    .mainTitle-container {
        line-height: 20px;
        margin: 25px;

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
        margin-left: 25px;

        .wrapperProperties {
            width: calc(100% / 3 - 20px);
            display: flex;
            flex-direction: column;
            overflow: hidden;
            margin: 15px 10px;
            user-select: none;
            border: 1px solid #eaeaea;
            border-radius: 10px;
            box-shadow: 0px 5px 5px 0px #ececec;
        }

        .wrapperProperties:hover {
            cursor: pointer;
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
            color: #898a8a;

            .fa-location-dot {
                margin-right: 5px;
            }

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