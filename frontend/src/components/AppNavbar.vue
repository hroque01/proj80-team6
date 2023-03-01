<script>
export default {
  name: 'AppNavbar',
  data() {
    return {
      links: [
        {
          icon: "fa-solid fa-utensils",
          text: "Collabora con noi",
          url: "#",
        },
        {
          icon: "fa-solid fa-cart-shopping",
          text: "Carrello",
          url: "#",
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
  <div class="container-fluid">
    <div class="container">
      <div class="logo">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
          <a class="navbar-brand" href="#">
            <h3>
              deliveboo
            </h3>
          </a>

          <!-- BUTTON FOR RESPONSIVE -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav mb-lg-0">

              <!-- v-for array print in DOM -->
              <li class="nav-item" v-for="link in links" :key="link.text" @click="toggleDropdown(link)">
                <a class="nav-link" aria-current="page" :href="link.url">

                  <!-- V-bind and v-for for icons -->
                  <i :class="link.icon"></i>
                  <!-- v-for for text -->
                  <span @click="toggleMenu">{{ link.text }}</span>

                  <!-- toggle menu -->
                  <ul v-if="link.toggle && link.dropdown" class="dropdown">
                    <li v-for="item in link.dropdown" :key="item.title">
                      <a href="item.url" class="mx-3">
                        <i :class="item.iconDrop"></i>
                        <span>{{ item.title }}</span>
                      </a>
                    </li>
                    <div class="mx-3">
                      <i class="fa-solid fa-right-from-bracket"></i>
                      <span>LOGOUT</span>
                    </div>
                  </ul>
                </a>
              </li>
            </ul>
          </div>
        </nav>

      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;

.dropdown {
  border: 1px solid black;
}
</style>
