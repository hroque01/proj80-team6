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
          url: "http://localhost:8000/dashboard",
          href: true,
        },
        {
          icon: "fa-solid fa-cart-shopping",
          text: "Carrello",
          url: "/checkout",
        },
      ]
    }
  },
  methods: {
    getCartTotal() {
      if (localStorage.total) {
        this.cartTotalValue = localStorage.total;
        store.total = this.cartTotalValue;
      } else {
        this.cartTotalValue = 0;
        store.total = this.cartTotalValue;
      }
      localStorage.total = this.cartTotalValue;
    }
  },
  mounted() {
    this.getCartTotal();
  },

}

</script>

<template>
  <nav
    :class="{ 'navbar-black': $route.name !== 'home', 'fixed': $route.name === 'restaurant-detail', 'margin-bottom': $route.name === 'checkout' }">
    <div class="my_container">
      <router-link to="/" class="navbar-brand">
        <img src="/public/img/logo-white.png" alt="logo deliveboo" :class="{ 'logo-black': $route.name === 'home' }">
        <img src="/public/img/logo.png" alt="logo deliveboo" :class="{ 'logo-white': $route.name !== 'home' }">
      </router-link>

      <ul>
        <!-- v-for array print in DOM -->
        <li v-for="(link, index) in links" :key="index" class="navCentred_resp">
          <!-- V-bind and v-for for icons -->
          <!-- v-for for text -->
          <span v-if="link.href">
            <a :href="link.url">
              <i v-if="link.icon === 'fa-solid fa-utensils'" :class="link.icon" class="icon-nav"></i>
              <span class="navBtn_txt">{{ link.text }}</span></a>
          </span>

          <span v-else>
            <router-link :to="{ name: 'checkout' }">
              <i v-if="link.icon === 'fa-solid fa-cart-shopping'" :class="link.icon" class="icon-nav"></i>
              <span class="navBtn_txt">{{ link.text }}</span>
              <span class="ps-1" v-if="index === 1 && store.total > 0">{{ parseFloat(store.total).toFixed(2)
              }}&euro;</span>
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

  .logo-white {
    display: none;
  }

  .logo-black {
    display: none;
  }

  .my_container {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  ul {
    display: flex;
    gap: 20px;

    li {

      a {
        background-color: #fff;
        border-radius: 8px;
        padding: 10px;
        border: 1px solid $btn_red;
        color: #000;
      }

      &:hover {
        a {
          border: 1px solid $btn_red;
          background-color: #ee5743be;
          color: #fff;
        }

        svg {
          color: #fff;
        }

      }
    }
  }
}

.navbar-black {
  background-color: #fafafa;
  border-bottom: 3px solid $btn_red;
}

.margin-bottom {
  margin-bottom: 50px;
}

.fixed {
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 20;
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

@media only screen and (max-width: 500px) {

  .navCentred_resp {
    padding-left: 20px;
  }

  .navBtn_txt {
    display: none;
  }

  .icon-nav {
    padding: 0;
  }

  nav {
    ul {
      gap: 0;

      li {

        &:nth-child(1) {
          a {
            padding: 10px 17px;
          }
        }

        &:nth-child(2) {
          a {
            padding: 10px 15px;
          }
        }
      }
    }
  }

}
</style>
