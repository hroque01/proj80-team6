<script>

import { store } from '../store';

export default {
  name: 'AppNavbar',
  data() {
    return {
      store,
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
    this.getCartTotal();
  },
  methods: {
    getCartTotal() {
      const totalValue = localStorage.getItem('total');
      this.cartTotalValue = totalValue;
      store.total = this.cartTotalValue;
      console.log(totalValue);
    }
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
              <span v-if="index === 1">{{ parseFloat(store.total).toFixed(2) }} €</span>
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
