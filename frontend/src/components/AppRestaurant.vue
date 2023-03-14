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
        },
        typologyGroups() {
        const groups = [];
        let i, j;
        for (i = 0, j = this.typologies.length; i < j; i += 5) {
            groups.push(this.typologies.slice(i, i + 5));
        }
        return groups;
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
                <v-carousel class="container-carousel" :interval="4000" :hide-delimiters="true" :hide-controls="true" >
                    <v-carousel-item v-for="(typologyGroup, index) in typologyGroups" :key="index">
                    <div class="d-flex flex-wrap carousel-typology">
                        <div class="typology" v-for="typology in typologyGroup" :key="typology.id">
                            <input type="checkbox" name="" :id="'typology_' + typology.id" v-model="selectedTypologies" :value="typology.id" />
                            <label class="reduction" :for="'typology_' + typology.id" :class="{ 'checked': typology.isChecked }" @click="typology.isChecked = !typology.isChecked">
                            <img :src="typology.image" />
                                <div class="typologyTag">{{ typology.name }}</div>
                            </label>
                        </div>
                    </div>
                    </v-carousel-item>
                </v-carousel>
            

            <div class="restaurantFilter">

                <!-- parte dx -->
                <div class="restaurants_box">

                    <!-- Restaurant List -->
                    <div class="restaurantsContainer">

                        <div class="mainTitle-container">
                            <span class="mainTitle">Lista dei ristoranti</span> <br>
                            <span class="mainTitle-descr">Dai un'occhiata alla nostra selezione</span>
                        </div>

                        <div class="restaurantWrapper">

                            <div class="restaurant wrapperProperties" v-for="restaurant in filteredRestaurants"
                                :key="restaurant.id">

                                <div class="deliveryPrice">
                                    <i class="fa-solid fa-motorcycle"></i> {{ restaurant.delivery_price }} &euro;
                                </div>
                                <div class="restaurant-img">
                                    <img :src="restaurant.image" alt="">
                                </div>
                                <div class="restaurant-info-wrapper">
                                    <div class="restaurant-info-restaurantName">
                                        <router-link :to="{ name: 'restaurant-detail', params: { id: restaurant.id } }"
                                            class="name_res">{{
                                                restaurant.business_name }}
                                        </router-link>
                                    </div>
                                    <div class="restaurant-info-address">
                                        <i class="fa-solid fa-location-dot"></i>{{ restaurant.address }}
                                    </div>
                                </div>

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

// filtri categoria
.carousel-typology {
    display: flex;
    gap: 12px;
    .typology {
        box-shadow: 0px 5px 5px 0px #ececec;
        height: 100%;
        border-radius: 10px;
        margin: 20px 0;
        

        input {
            display: none;
        }

        img {
            border-top-right-radius: 10px;
            border-top-left-radius: 10px;
        }

        .typologyTag {
            padding: 10px;
            text-align: center;
        }

        .checked {
            border: 5px solid $btn_red;
            border-radius: 15px;
        }
    }

}

section {
    margin: 50px 0;

    .restaurantFilter {
        @include flex(flex);
    }
}

// vedere se eliminare questo codice: era il codice della nav bar laterale con le categorie e scrollbar
// nav {
//     height: 100vh;
//     overflow: auto;
//     width: 300px;
//     padding: 20px;
//     border: 1px solid #eaeaea;
//     border-radius: 10px;
//     box-shadow: 0px 20px 5px 0px #ececec;
// }


.reduction {
    width: 230px;
}

.container-carousel {
    height: 230px !important;
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

        .name_res {
            color: $text_black;

            &:hover {
                text-decoration: underline;
            }
        }

        .wrapperProperties {
            width: calc(100% / 4 - 20px);
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