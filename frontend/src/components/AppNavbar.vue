<script>

import { store } from '../store';

export default {
  name: 'AppNavbar',
  data() {
    return {
      store,
      links: [
        {
          icon: "fa-solid fa-utensils",
          text: "Collabora con noi",
          url: "http://localhost:8000/restaurant",
        },
        {
          icon: "fa-solid fa-cart-shopping",
          url: "/checkout",
        },
      ]
    }
  }
}

</script>

<template>
  <nav class="navbar navbar-expand-lg bg-body-tertiary" :class="{ 'navbar-black': $route.name !== 'home' }">
    <div class="container">
      <router-link to="/" class="navbar-brand">
        <img src="/public/img/logo.png" alt="logo deliveboo">
      </router-link>


      <!-- BUTTON FOR RESPONSIVE -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav mb-lg-0">

          <!-- v-for array print in DOM -->
          <li class="nav-item general-btn" v-for="(link, index) in links" :key="index">
            <div class="nav-link">
              <!-- V-bind and v-for for icons -->
              <i :class="link.icon" class="icon-nav"></i>
              <!-- v-for for text -->
              <span @click="toggleMenu">
                <span v-if="link.text">
                  <a :href="link.url">{{ link.text }}</a>
                </span>

                <span v-else>
                  <router-link :to="{ name: 'cart' }">Carrello </router-link>
                </span>

                <span v-if="index === 1">{{ store.length }}</span>
              </span>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;

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

.nav-link {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  position: relative;
  cursor: pointer;

  .icon-nav {
    color: #EE5743;
  }

}

.general-btn {
  @include button;
}
</style>
