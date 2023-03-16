<script>

import axios from 'axios';

const API_URL = 'http://localhost:8000/api/v1/';

export default {
  name: 'AppData',
  data() {
    return {
      order: [],
      newOrder: {
      customer_name: '',
      address: '',
      email: '',
      phone_number: '',
      total: 0
    }
    };
  },
  methods: {
    getOrders(e) {
      e.preventDefault();

      const newOrder = this.newOrder;
      console.log(newOrder);

      axios
        .post(API_URL + 'order/store', newOrder)
        .then((res) => {
          const data = res.data;
          const success = data.success;
          const order = data.order;

          this.order = order;
        })
        .catch((err) => console.error(err));
    },
  },
};
</script>

<template>
  Info Dati

  <form>
    
    <!-- nome -->
    <div class="flex-form">
      <label for="customer_name">Inserisci il tuo nome e cognome<span>*</span></label>
      <input type="text" placeholder="Mario Rossi" name="customer_name" required id="customer_name" v-model="newOrder.customer_name">
    </div>

    <!-- indirizzo -->
    <div class="flex-form">
      <label for="address">Inserisci il tuo indirizzo<span>*</span></label>
      <input type="text" placeholder="Via Roma, 10" name="address" required id="address" v-model="newOrder.address">
    </div>

    <!-- email -->
    <div class="flex-form">
      <label for="email">Inserisci la tua email<span>*</span></label>
      <input type="email" placeholder="email@prova.it" name="email" required id="email" v-model="newOrder.email">
    </div>

    <!-- telefono -->
    <div class="flex-form">
      <label for="phone_number">Inserisci il tuo telefono<span>*</span></label>
      <input type="text" placeholder="3468888888" name="phone_number" required id="phone_number" v-model="newOrder.phone_number">
    </div>

    
    <div class="flex-form">
      <label for="total">Totale<span>*</span></label>
      <input type="number" step=".01" placeholder="totale" name="total" required id="total" v-model="newOrder.total">
    </div>

    <input @click="getOrders" type="submit" value="Invia">

  </form>
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;

form{
    width: 600px;
    padding: 20px;
    display: flex;
    flex-direction: column;
    // debug
    border: 1px solid black;

    .flex-form{
        @include flex(between);
        margin: 10px 0;
        
        span{
            color: $btn_red;
        }

        input{
            padding: 5px;
            width: 55%;
        }
    }

    input[type="submit"]{
        align-self: center;
        margin-top: 10px;
        padding: 0 15px;
    }

}

</style>