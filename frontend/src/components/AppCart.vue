<script>
import { store } from '../store';

export default {
    name: 'AppCart',
    data() {
        return {
            store,
            cartTotalValue: 0,
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
        },
        getCartTotal() {
            if (store.total) {
                const totalValue = localStorage.getItem('total');
                this.cartTotalValue = totalValue;
                store.total = this.cartTotalValue;
            }
        }
    },

}

</script>

<template>
    Totale: {{ store.total }}
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