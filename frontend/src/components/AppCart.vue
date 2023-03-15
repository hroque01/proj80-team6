<script>
import { store } from '../store';

export default {
    name: 'AppCart',
    data() {
        return {
            store,
        };
    },
    methods: {
        emptyCart() {
            localStorage.clear();
            store.length = 0;
            store.total = 0;
        }
    },
    computed: {
        getItems() {
            const data = {};
            // Popola l'oggetto data con tutti gli elementi presenti in localStorage
            if (store.length !== 0) {
                for (let key in localStorage) {
                    data[key] = JSON.parse(localStorage.getItem(key));
                }
            }
            // Prendi solo le chiavi degli elementi che iniziano con "storedQuantity_"
            //La funzione Object.keys() viene utilizzata per recuperare un array di tutte le chiavi presenti nell'oggetto localStorage.
            const itemKeys = Object.keys(localStorage).filter(key => key.startsWith("storedQuantity_"));
            // Somma la quantità e il prezzo per ogni elemento con lo stesso nome
            const items = {};
            let total = 0;
            itemKeys.forEach(key => {
                const item = JSON.parse(localStorage.getItem(key));
                const name = item.name;
                if (items[name]) {
                    items[name].quantity += 1;
                    items[name].price = parseFloat(items[name].price) + parseFloat(item.price);
                } else {
                    items[name] = { name: item.name, quantity: 1, price: parseFloat(item.price) };
                }
                total += parseFloat(item.price);
            });
            store.total = total;
            return items;
        }
    },

}

</script>

<template>
    <!-- main section  -->
    <main class="pt-5 pb-3">
        <div class="container">
            <div class="row">
                <h3 class="col">
                    <b>Controlla il tuo ordine da U Sushi 8</b>
                </h3>
            </div>
            <h5 class="col mt-5 mb-2">
                <b>Dettagli consegna</b>
            </h5>
        </div>
        <div class="col-4">
            <div class="card px-3 mb-4 py-2">
                <h5 class="card-body px-0 py-2">
                    <strong>Carrello</strong>
                </h5>
                <button v-if="store.length !== 0" @click="emptyCart">Svuota carrello</button>

                <ul>
                    <li v-for="item in getItems" class="d-flex justify-content-between align-items-center mb-2">
                        <div>{{ item.quantity }}x {{ item.name }}</div>
                        <div>{{ item.price.toFixed(2) }} €</div>
                    </li>
                </ul>
                <hr class="border-top border-dark mb-3">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div><b>Totale</b></div>
                    <div><b>{{ store.total.toFixed(2) }} €</b></div>
                </div>
            </div>
        </div>
    </main>
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;

main {
    background-color: rgb(249, 250, 250);
}

.cards {
    width: 80px;
    height: 30px;
    background-color: black;
}

.expired {
    color: red;
}

.is-invalid {
    border-color: #dc3545;
}

.cash {
    width: 30px;
    height: 30px;
    background-color: black;
}

.payButton {
    background-color: rgb(0, 204, 188);
    border-radius: 5px;
    cursor: pointer;
}

.payButton:hover {
    background-color: rgb(0, 194, 179);
}

.pointer:hover {
    cursor: pointer;
}
</style>