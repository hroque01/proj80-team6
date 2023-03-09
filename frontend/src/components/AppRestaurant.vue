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
        //  che corrispondono ai criteri di selezione:
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
  
    <div class="my_container">
        <div class="restaurantFilter">

            <!-- Navbar laterale a sinistra - elenco categorie -->
            <nav>
                <ul>
                <li>
                
                    <div v-for="typology in typologies" :key="typology.id">
                        <input type="checkbox" name="" :id="'typology_' + typology.id" v-model="selectedTypologies" :value="typology.id">
                        <label :for="'typology_' + typology.id">{{ typology.name }}</label>
                    </div>
                </li>
                </ul>
            </nav>

            <!-- sezione dx con elenco ristoranti -->
            <div class="my_container restaurants_box">
                <div v-for="restaurant in filteredRestaurants" :key="restaurant.id">
                    <h2>{{ restaurant.business_name }}</h2>
                    <p>{{ restaurant.address }}</p>
                    <p>{{ restaurant.phone }}</p>
                    <p>Typologies:</p>
                    <ul>
                        <li v-for="typology in restaurant.typologies" :key="typology.id" v-if="restaurant.typologies">{{ typology.name }}</li>
                    </ul>
                </div>
                <div v-if="filteredRestaurants.length === 0">
                    <p>No restaurants match the selected criteria.</p>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;

.restaurantFilter {
    @include flex(flex);
}

nav {
    border: 1px solid #000;
    width: 300px;
    padding: 20px;

    ul {
        li {
            padding: 15px;
            line-height: 80px;
        }
    }
}

.restaurants_box {

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
        margin-right: 50px;

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