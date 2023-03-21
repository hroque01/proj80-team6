<script>

import axios from 'axios';
import { store } from '../store';

const API_URL = 'http://localhost:8000/api/v1/';

export default {
    name: 'AppRestaurant',
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

                    // imposto la proprietà isChecked su false per tutte le tipologie nell'array typologies quando aggiorno la lista delle tipologie, in modo che le checkbox non rimangono selezionate quando la selezione viene modificata.
                    if (success) {
                        this.typologies = typologies.map(typology => {
                            typology.isChecked = false;
                            return typology;
                        });
                        this.restaurants = restaurants;
                    }
                })
                .catch(err => console.error(err));
        },
        getRestaurantImage(restaurant) {
            let restaurantImage;
            if (restaurant.image.includes("restaurants-image")) {
                restaurantImage = 'http://[::1]:5173/storage/app/public/' + restaurant.image;
            } else {
                restaurantImage = restaurant.image;
            }
            return restaurantImage;
        },
    },
    computed: {
        // metodo che filtra i ristoranti in base alle tipologie selezionate dall'utente.
        filteredRestaurants() {

            // variabile con lista completa di tutti i ristoranti:
            let filteredRestaurants = this.restaurants;

            // condizione: se utente ha selezionato almeno una tipologia, mi restituisce con il filter solo ristoranti    
            //  che corrispondono ai criteri di selezione: soddisfando tutte le selezioni utente
            if (this.selectedTypologies.length > 0) {
                filteredRestaurants = filteredRestaurants.filter(restaurant => {
                    return this.selectedTypologies.every(typologyId => {
                        return restaurant.typologies.some(typology => typology.id === typologyId);
                    });
                });
            }

            return filteredRestaurants;
        },

    },
    mounted() {
        this.updateTypologies();
    }
};
</script>

<template>
    <section>

        <!-- div container -->
        <div class="my_container">

            <div class="mainTitle-container">
                <h2>
                    Lista dei ristoranti
                </h2>
                <h4>
                    Dai un'occhiata alla nostra selezione
                </h4>
            </div>

            <div class="restaurantFilter">

                <!-- Navbar laterale a sinistra - elenco categorie -->
                <nav class="nav-filter-container">
                    <h4 class="mb-3">Categorie</h4>
                    <ul class="typologies-list">
                        <!-- ciclo per stampare elenco categorie da dbs -->
                        <div v-for="typology in typologies" :key="typology.id">
                            <li>
                                <input type="checkbox" name="" :id="'typology_' + typology.id" v-model="selectedTypologies"
                                    :value="typology.id">
                                <label :for="'typology_' + typology.id" :class="{ 'checked': typology.isChecked }"
                                    @click="typology.isChecked = !typology.isChecked">
                                    <img class="icon-cat" :src="'/img/icons/' + typology.image" />
                                    <div class="typologyTag">{{ typology.name }}</div>
                                </label>
                            </li>
                        </div>
                    </ul>
                </nav>

                <!-- parte dx -->
                <div class="my_container restaurants_box">

                    <!-- Restaurant List -->
                    <div class="restaurantsContainer">

                        <div class="no-restaurant" v-if="filteredRestaurants.length === 0">
                            <i class="fa-regular fa-face-frown"></i>
                            Mi dispiace non c'&egrave; nessun ristorante che soddisfa le tue selezioni<p>Prova con un'altra
                                categoria</p>
                        </div>
                        <div class="restaurantWrapper">


                            <div class="restaurant wrapperProperties" v-for="restaurant in filteredRestaurants"
                                :key="restaurant.id">

                                <router-link :to="{ name: 'restaurant-detail', params: { id: restaurant.id } }">
                                    <div class="deliveryPrice">
                                        <i class="fa-solid fa-motorcycle"></i> {{ restaurant.delivery_price }} &euro;
                                    </div>
                                    <div class="restaurant-img">
                                        <img :src="getRestaurantImage(restaurant)" :alt="restaurant.business_name">
                                    </div>
                                    <div class="restaurant-info-wrapper">
                                        <div class="restaurant-info-restaurantName">
                                            <div class="name_res">
                                                {{ restaurant.business_name }}
                                            </div>
                                        </div>
                                        <div class="restaurant-info-address">
                                            <i class="fa-solid fa-location-dot"></i>{{ restaurant.address }}
                                        </div>
                                    </div>
                                </router-link>
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
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;


.mainTitle-container {
    width: 100%;
    padding-bottom: 20px;

    h2 {
        font-weight: bold;
        color: $btn_red;
        margin-bottom: 5px;
    }

    h4 {
        font-size: 18px;
    }
}

nav {
    height: 600px;
    width: 300px;
    padding: 20px;
    border: 1px solid #eaeaea;
    border-radius: 10px;
    box-shadow: 0px 20px 5px 0px #ececec;

    ul {
        overflow-y: auto;
        height: 520px;

        li {
            padding: 15px;
            line-height: 35px;
            border-bottom: 1px solid #eaeaea;
        }
    }

    label {
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    input[type=checkbox] {
        display: none;
    }

    .icon-cat {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        margin-right: 20px;
        padding: 5px;
        opacity: 0.4;
    }

    .typologyTag {
        font-size: 17px;
    }

    .checked {
        .typologyTag {
            font-weight: bold;
        }

        .icon-cat {
            opacity: 1;
        }
    }
}

section {
    margin: 50px 0;

    .restaurantFilter {
        @include flex(flex);
    }
}

// regole parte dx main
.restaurants_box {

    //Boxes wrapper and box properties
    .restaurantWrapper {
        display: flex;
        flex-wrap: wrap;
        margin-left: 25px;
        height: 600px;
        overflow-y: auto;

        .name_res {
            color: $text_black;
            font-size: 18px;

            &:hover {
                text-decoration: underline;
            }
        }

        .wrapperProperties {
            width: calc(100% / 3 - 20px);
            display: flex;
            margin: 15px 10px;
            user-select: none;
            border: 1px solid #eaeaea;
            border-radius: 10px;
            box-shadow: 0px 5px 5px 0px #ececec;

            &:hover {
                border-bottom: 5px solid $btn_red;
            }
        }
    }
}

// lpBoxes

.restaurantsContainer {
    flex-direction: row;

    .no-restaurant {
        display: block;
        font-size: 20px;
        padding: 25px;
        font-style: italic;
        color: rgb(101, 101, 101);

        p {
            font-size: 18px;
        }
    }

}

.restaurant {
    max-width: 270px;
    height: 230px;
    border-radius: 5px;
    overflow: hidden;
    position: relative;

    .restaurant-img {
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
        background-color: $btn_red;
        color: white;
        padding: 5px 10px;
        border-radius: 50px;
    }
}

@media only screen and (max-width: 1270px) {

    // screen width 1200px
    .my_container {
        width: 95%;
        margin: 0 auto;
    }

    .restaurant {
        min-width: 150px;
        height: 230px;
        border-radius: 5px;
        overflow: hidden;
        position: relative;

        .restaurant-img {
            width: 200%;
        }
    }

}

@media only screen and (max-width: 1100px) {

    .restaurant-info-wrapper {

        .restaurant-info-restaurantName {

            .name_res {
                font-size: 13px;
            }

        }

        .restaurant-info-address {
            font-size: 12px;
        }

    }

}

@media only screen and (max-width: 900px) {
    .restaurant {
        height: 180px;
        border-radius: 5px;
        overflow: hidden;
        position: relative;

        .restaurant-info-wrapper {

            .restaurant-info-restaurantName {

                .name_res {
                    font-size: 13px;
                    font-weight: 700;
                }

            }

        }

        .deliveryPrice {
            font-size: 11px;
            width: 80px;
            right: 10px;
            background-color: $btn_red;
            color: white;
            padding: 3px 8px;
        }

    }
}

@media only screen and (max-width: 806px) {

    .restaurant {
        min-width: 210px;
        border-radius: 5px;
        overflow: hidden;
        position: relative;

        .restaurant-img {
            width: 200%;
        }
    }

}

@media only screen and (max-width: 750px) {

    .restaurant {
        min-width: 45%;
        border-radius: 5px;
        overflow: hidden;
        position: relative;

        .restaurant-img {
            width: 200%;
        }
    }

}

@media only screen and (max-width: 679px) {

    .restaurant {
        min-width: 90%;
        border-radius: 5px;
        overflow: hidden;
        position: relative;

        .restaurant-img {
            width: 100%;
        }
    }

    nav {
        padding-left: 0;

        ul {

            .typologyTag {
                font-size: 13px;
            }
        }
    }

}

@media only screen and (max-width: 470px) {

    .restaurantWrapper {
        height: 625px;
    }

    .mainTitle-container {
        padding-left: 10px;
    }

    section {
        margin: 50px 0;

        .restaurantFilter {
            display: block;
        }

        .nav-filter-container {
            width: 95%;
            height: 120px;
            margin: 0 auto;

            .mb-3 {
                margin-bottom: 10px;
            }

            .typologies-list {
                display: flex;
                gap: 25px;
                margin-inline: -15px;
                overflow-x: scroll;
                scrollbar-width: none;
                margin-top: -22px;
            }

            .icon-cat {
                width: 50px;
                height: 50px;
                border-radius: 50%;
                margin-right: 5px;
                padding: 5px;
                opacity: 0.4;
            }

            .typologyTag {
                font-size: 14px;
                margin-right: 20px;
            }

            .checked {
                .typologyTag {
                    font-weight: bold;
                }

                .icon-cat {
                    opacity: 1;
                }
            }

        }


    }

    .nav-filter-container {
        width: 100%;
    }

    .my_container {
        margin-inline: 0;
        width: 100%;
    }

    .restaurants_box {
        .restaurantWrapper {
            display: flex;
            flex-wrap: wrap;
            margin-left: 0px;
            height: 600px;
            overflow-y: auto;
            justify-content: center;
        }
    }

    nav {
        ul {
            li {
                border-bottom: 0px solid #eaeaea;
            }
        }
    }

}
</style>