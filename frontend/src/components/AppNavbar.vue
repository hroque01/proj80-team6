<script>

import { store } from '../store';

export default {
  name: 'AppNavbar',
  data() {
    return {
      restaurants: [],
      dishes: [],
      store,
      selRes: null,
      selResId: null,
      cartResId: null,
      deliveryPrice: null,
      requestChangeCart: false,
      cart: [],
      cartTotal: 0,
      cartadd: {
        id: "",
        name: "",
        price: "",
        image: "",
        restaurant_id: "",
      },
      cartTotalValue: 0,
      links: [
        {
          icon: "fa-solid fa-utensils",
          text: "Collabora con noi",
          url: "http://localhost:8000/restaurant",
          href: true,
        },
        {
          icon: "fa-solid fa-cart-shopping",
          text: "Carrello",
          url: "/cart",
        },
      ]
    }
  },
  created() {
    this.viewCart();
  },
  methods: {
    viewCart() {
      if (localStorage.getItem("cart")) {
        this.cart = JSON.parse(localStorage.getItem("cart"));
      }
    },
    getDishes() {
      if (this.$route.params.id && this.$route.name === 'restaurant-detail') {
        axios.get(API_URL + 'restaurant/' + this.$route.params.id)
        .then(res => {
          const data = res.data;
          const success = data.success;
          const response = data.response;
          const dishes = response.dishes;
          const restaurants = response.restaurants;
          const resDelPrice = response.restaurants[this.$route.params.id - 1].delivery_price;
          if (success) {
            this.dishes = dishes;
            this.restaurants = restaurants;
            this.deliveryPrice = resDelPrice;
          }
        })
        .catch(err => console.error(err));
      }
    },
    added(dish) {
      // when user choose a buy, this function add that in cart
      if (this.selResId == this.cartResId) {
        const item = Object.values(this.cart).find(item => item.id === dish.id);
        if (item) {
          item.quantity += 1;
          this.saveCats();
        } else {
          // cartadd is here to get all things that click or chosen by user
          this.cartadd.id = dish.id;
          this.cartadd.name = dish.name;
          this.cartadd.price = dish.price;
          this.cartadd.image = dish.image;
          this.cartadd.quantity = 1;
          this.cartadd.restaurant_id = dish.restaurant_id;
          this.cart.push(this.cartadd);
          this.cartadd = {};
          
          this.saveCats(); // this function most important to save all inform of products
        }
      }
      else {
        this.requestChangeCart = true;
      }
      this.getTotal();
      console.log(this.cartTotal);
    },
    remove(id) {
        const item = Object.values(this.cart).find(item => item.id === id);
        if (item !== undefined) {
          item.quantity -= 1;
          if (item.quantity <= 0) {
            const index = this.cart.indexOf(item);
            this.cart.splice(index, 1);
            /* if (this.cart.length == 0) { */
            localStorage.removeItem('cart');
            /* } */
          }
          if (this.cart.length !== 0) {
            this.saveCats();
          }
        }
      this.getTotal();
      /* console.log(this.cartTotal); */
    },
    /* getDeliveryPrice() {
      if (this.$route.params.id) {
        console.log(this.$route.params.id);
        console.log(this.restaurants);
      }
    }, */
    getTotal() {
        if (this.cart) {
          let cart = this.cart;
          let sum = 0;
          let i = 0;
          while (i < cart.length) {
            let item = cart[i];
            sum += item.quantity * parseFloat(item.price);
            i++;
          }
          if (this.cart.length > 0) {
            sum += parseFloat(this.deliveryPrice);
          } 
          this.cartTotal = sum;
        }
        if (this.cartTotal) {
          store.total = this.cartTotal;
        }
        localStorage.setItem('total', this.cartTotal);   
    },
    saveCats() {
      // for save in local storage set the below code
      let parsed = JSON.stringify(this.cart);
      localStorage.setItem("cart", parsed);
      this.viewCart(); // by this function we can see all products are save in web
    },
    filterRestaurants() {
      this.selResId = parseInt(this.$route.params.id);
      if (localStorage.getItem("cart")) {
        const cart = JSON.parse(localStorage.getItem('cart'));
        if (cart[0]) {
          const firstItem = cart[0];
          const cartRestaurantId = firstItem.restaurant_id;
          this.cartResId = cartRestaurantId;
        }
      }
      /* if (localStorage.getItem("storedQuantity_0")) {
        let storedQuantity = localStorage.getItem("storedQuantity_0");
        let cartRestaurantId = JSON.parse(storedQuantity).restaurant_id;
        this.cartResId = cartRestaurantId;
      } */
      else {
        this.cartResId = this.selResId;
      }
    },
    /* addDish(id) {
      console.log(this.cartResId);
      console.log(this.selResId);
      if (store.length == 0) {
        const key = 'storedQuantity_' + localStorage.length;
        localStorage.setItem(key, JSON.stringify(this.dishes[id]));
        store.length = localStorage.length;
        console.log(this.selResId);
        /* const value = localStorage.getItem(key);
        store.items.push(JSON.parse(value)); */
        /* console.log(store.items); */
        /* this.restaurants.forEach(function(res) {
          if (res.id == store.restaurantId) {
            store.restaurantName = res.business_name;
            console.log(store.restaurantName);
          }
        }); 
      }
      else {
        if (this.selResId == this.cartResId) {
          const key = 'storedQuantity_' + localStorage.length;
          localStorage.setItem(key, JSON.stringify(this.dishes[id]));
          store.length = localStorage.length;
        }
        else {
          this.requestChangeCart = true;
        }
      }
    }, */
    /* addOneItem(id) {
      let storageData = Object.values(localStorage);

      // converte gli elementi in un array di oggetti JavaScript
      let data = storageData.map(item => JSON.parse(item));

      console.log(data);
      console.log(localStorage);

      store.length = localStorage.length;
      let dish = this.dishes.find(dish => dish.id === id);
      const key = 'storedQuantity_' + localStorage.length;
      localStorage.setItem(key, JSON.stringify(dish));
      console.log(store.length);
      this.updateItems();
    }, */
    /* removeOneItem(id) {
      store.length = localStorage.length;
      console.log(store.length);
      for (let i = 0; i < localStorage.length; i++) {
        let oggettoLocalStorage = JSON.parse(localStorage.getItem(localStorage.key(i)));
        if (oggettoLocalStorage.id === id) {
          localStorage.removeItem(localStorage.key(i));
          break;
        }
      }
      this.updateItems();
    }, */
    emptyCart() {
      this.cart = [];
      localStorage.clear();
      /* localStorage.clear();
      store.length = 0;
      store.total = 0; */
      this.requestChangeCart = false;
      this.cartResId = this.selResId;
      this.getTotal();
      store.total = this.cartTotal;
    },
    scrollToTop() {
      window.history.back();
      window.scrollBy(0, -1000);
    }
  },
  computed: {
    filteredRestaurants() {
      let selectedRestaurant = this.restaurants.filter(restaurant => restaurant.id === parseInt(this.$route.params.id));
      this.selRes = selectedRestaurant;

      return selectedRestaurant;
    },
  },
  mounted() {
    this.filterRestaurants();
    this.getDishes();
  },
  updated() {
    this.filterRestaurants();
    this.getTotal();
  },
}

</script>

<template>
  <nav :class="{ 'navbar-black': $route.name !== 'home' }">
    <div class="my_container">
      <router-link to="/" class="navbar-brand">
        <img src="/public/img/logo.png" alt="logo deliveboo">
      </router-link>

      <ul>
        <!-- v-for array print in DOM -->
        <li v-for="(link, index) in links" :key="index">
          <!-- V-bind and v-for for icons -->
          <!-- v-for for text -->
          <span v-if="link.href">
            <a :href="link.url">
              <i v-if="link.icon === 'fa-solid fa-utensils'" :class="link.icon" class="icon-nav"></i>
              {{ link.text }}</a>
          </span>

          <span v-else>
            <router-link :to="{ name: 'cart' }">
              <i v-if="link.icon === 'fa-solid fa-cart-shopping'" :class="link.icon" class="icon-nav"></i>
              {{ link.text }}
              <span v-if="index === 1 && this.cartTotal !== 0">{{ parseFloat(this.cartTotal).toFixed(2) }} €</span>
            </router-link>
          </span>
        </li>
      </ul>
    </div>
  </nav>
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;

nav {
  padding: 15px 0;

  .my_container {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  ul {
    display: flex;
    gap: 20px;

    li {
      background-color: #fff;
      border-radius: 8px;
      padding: 10px;

      a {
        color: #000;
      }
    }
  }
}

.navbar-black {
  background-color: #000;
}

.navbar-brand {
  img {
    width: 70px;
    height: 70px;
    object-fit: contain;
    border-radius: 50%;
    padding: 2px;
    border: 2px solid $btn_red;
  }
}

.icon-nav {
  color: #EE5743;
  padding-right: 10px;
}

// .general-btn {
//   @include button;
// }
</style>
