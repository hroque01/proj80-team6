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

            <div class="restaurantFilter">

                <!-- Navbar laterale a sinistra - elenco categorie -->
                <nav>
                    <h4 class="mb-3">Categorie</h4>
                    <ul>
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
                                            class="name_res">
                                            {{ restaurant.business_name }}
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

.my_container {
    display: flex;
}

nav {
    height: 80vh;
    width: 300px;
    overflow: auto;
    padding: 20px;
    border: 1px solid #eaeaea;
    border-radius: 10px;
    box-shadow: 0px 20px 5px 0px #ececec;

    ul {
        li {
            padding: 15px;
            line-height: 35px;
            border-bottom: 1px solid #eaeaea;
            ;
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
    height: 80vh;
    overflow-y: auto;

    //generalrestaurantWrappe
    //Boxes title
    .mainTitle-container {
        line-height: 20px;
        margin: 25px;

    }

    //Boxes wrapper and box properties
    .restaurantWrapper {
        display: flex;
        flex-wrap: wrap;
        margin-left: 25px;

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
        background-color: $btn_red;
        color: white;
        padding: 5px 10px;
        border-radius: 50px;
    }
}
</style>