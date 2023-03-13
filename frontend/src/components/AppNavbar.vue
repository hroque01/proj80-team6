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
        {
          icon: "fa-solid fa-bars",
          text: "Menu",
          toggle: false,
          dropdown: [
            {
              iconDrop: "fa-solid fa-user",
              title: "Account",
              email: "email.com",
              url: "#",
            },
            {
              iconDrop: "fa-solid fa-receipt",
              title: "Storico ordini",
              url: "#",
            },
            {
              iconDrop: "fa-solid fa-clipboard-question",
              title: "FAQ",
              url: "#",
            },
          ]
        }
      ]
    }
  },
  methods: {
    toggleDropdown(link) {
      link.toggle = !link.toggle;
    }
  }
}

</script>

<template>
  <div class="logo">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <router-link to="/" class="navbar-brand">
        <img src="/public/img/logo.png" alt="logo deliveboo">
        <span>Deliveboo</span>
      </router-link>


      <!-- BUTTON FOR RESPONSIVE -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav mb-lg-0">

          <!-- v-for array print in DOM -->
          <li class="nav-item general-btn" v-for="(link, index) in links" :key="index" @click="toggleDropdown(link)">
            <router-link :to="{ name: 'cart' }" class="nav-link" aria-current="page" :href="link.url">
              <!-- V-bind and v-for for icons -->
              <i :class="link.icon"></i>
              <!-- v-for for text -->
              <span @click="toggleMenu">
                <span v-if="link.text">
                  {{ link.text }}
                </span>

                <span v-else>
                  Carrello
                </span>

                <span v-if="index === 1">{{ store.length }}</span>
              </span>

              <!-- toggle menu -->
              <ul v-if="link.toggle && link.dropdown" class="dropdown my-2">
                <!-- Bootstrap margin class -->
                <li class="m-2" v-for="item in link.dropdown" :key="item.title">
                  <a href="item.url" class="mx-3">
                    <i class="mx-2" :class="item.iconDrop"></i>
                    <span>{{ item.title }}</span>
                  </a>
                </li>

                <!-- LOGOUT DA TOGLIERE OPURE NO CIT ROMINA -->
                <!-- <a class="m-4" href="#">
                                                                                                                                                                                        <i class="fa-solid fa-right-from-bracket mx-2"></i>
                                                                                                                                                                                        <span>LOGOUT</span>
                                                                                                                                                                    </a> -->
                <!--  -->

              </ul>
            </router-link>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;

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
}

.dropdown {
  width: 200px;
  background-color: white;
  border: 1px solid black;
  border-radius: 5%;
  padding: 10%;
  position: absolute;
  top: 40px;
  left: -115px;
  z-index: 100;

}

.general-btn {
  @include button;
}
</style>
