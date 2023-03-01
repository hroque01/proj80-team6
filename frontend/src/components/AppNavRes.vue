<script>
export default {
    name: 'AppNavRes',
    data() {
        return {
            showList: false
        }
    }
}
</script>

<template>
    <!-- Navbar laterale a sinistra - pagina ristoranti -->
    <nav>
        <ul>
            <!-- Blocco con nome luogo -->
            <li class="info-place">
                <div class="place">
                    <div class="icon">
                        <i class="fa-solid fa-motorcycle motorcycle"></i>
                    </div>
                    <div class="name">
                        Adesso <div>Mantova</div>
                    </div>
                </div>
                <div class="change">
                    <a href="/">Cambia</a>
                </div>
            </li>
            <!-- Blocco con scelta consegna / ritiro -->
            <li>
                <form>
                    <input type="radio" name="" id="">
                    <label for="">Consegna</label>
                    <br>
                    <input type="radio" name="" id="">
                    <label for="">Ritiro</label>
                </form>
            </li>
        </ul>

        <ul class="filters">
            <!-- Blocco dove scelgo quali ristoranti mostrare -->
            <li>
                <div class="text">
                    Ordina
                    <span @click="showList = !showList">
                        <span v-if="showList">
                            <i class="fa-solid fa-angle-up"></i>
                        </span>
                        <span v-else>
                            <i class="fa-solid fa-angle-down"></i>
                        </span>
                    </span>
                </div>
                <!-- Lista che appare al click della freccia -->
                <ul v-if="showList">
                    <li>
                        <form>
                            <input type="radio" name="" id="">
                            <label for="">Consegna pi&ugrave; rapida</label>
                            <br>
                            <input type="radio" name="" id="">
                            <label for="">Consigliati</label>
                            <br>
                            <input type="radio" name="" id="">
                            <label for="">Distanza</label>
                            <br>
                            <input type="radio" name="" id="">
                            <label for="">I pi&ugrave; votati</label>
                        </form>
                    </li>
                </ul>
            </li>
            <!-- Blocco con tipi di offerte -->
            <li>
                <div class="text">
                    Offerte
                    <span @click="showList = !showList">
                        <span v-if="showList">
                            <i class="fa-solid fa-angle-up"></i>
                        </span>
                        <span v-else>
                            <i class="fa-solid fa-angle-down"></i>
                        </span>
                    </span>
                </div>
                <!-- Lista che appare al click della freccia -->
                <ul v-if="showList">
                    <li>
                        <form>
                            <input type="radio" name="" id="">
                            <label for="">Offerta 1</label>
                            <br>
                            <input type="radio" name="" id="">
                            <label for="">Offerta 2</label>
                            <br>
                            <input type="radio" name="" id="">
                            <label for="">Offerta 3</label>
                            <br>
                            <input type="radio" name="" id="">
                            <label for="">Offerta 4</label>
                        </form>
                    </li>
                </ul>
            </li>
            <!-- Blocco con regimi alimentari -->
            <li>
                <div class="text">
                    Regimi alimentari
                    <span @click="showList = !showList">
                        <span v-if="showList">
                            <i class="fa-solid fa-angle-up"></i>
                        </span>
                        <span v-else>
                            <i class="fa-solid fa-angle-down"></i>
                        </span>
                    </span>
                </div>
                <!-- Lista che appare al click della freccia -->
                <ul v-if="showList">
                    <li>
                        <form>
                            <input type="checkbox" name="" id="">
                            <label for="">Senza glutine</label>
                            <br>
                            <input type="checkbox" name="" id="">
                            <label for="">Vegan friendly</label>
                            <br>
                            <input type="checkbox" name="" id="">
                            <label for="">Vegano</label>
                            <br>
                            <input type="checkbox" name="" id="">
                            <label for="">Vegetariano</label>
                        </form>
                    </li>
                </ul>
            </li>
            <!-- Blocco con categorie -->
            <li>
                <div class="text">
                    Categorie
                    <span @click="showList = !showList">
                        <span v-if="showList">
                            <i class="fa-solid fa-angle-up"></i>
                        </span>
                        <span v-else>
                            <i class="fa-solid fa-angle-down"></i>
                        </span>
                    </span>
                </div>
                <!-- Lista che appare al click della freccia -->
                <ul v-if="showList">
                    <li>
                        <form>
                            <input type="checkbox" name="" id="">
                            <label for="">Categoria 1</label>
                            <br>
                            <input type="checkbox" name="" id="">
                            <label for="">Categoria 2</label>
                            <br>
                            <input type="checkbox" name="" id="">
                            <label for="">Categoria 3</label>
                            <br>
                            <input type="checkbox" name="" id="">
                            <label for="">Categoria 4</label>
                            <br>
                            <input type="checkbox" name="" id="">
                            <label for="">Categoria 5</label>
                            <br>
                            <input type="checkbox" name="" id="">
                            <label for="">Categoria 6</label>
                            <br>
                            <input type="checkbox" name="" id="">
                            <label for="">Categoria 7</label>
                            <br>
                            <input type="checkbox" name="" id="">
                            <label for="">Categoria 8</label>
                            <br>
                            <input type="checkbox" name="" id="">
                            <label for="">Categoria 9</label>
                            <br>
                            <input type="checkbox" name="" id="">
                            <label for="">Categoria 10</label>
                            <br>
                            <input type="checkbox" name="" id="">
                            <label for="">Categoria 11</label>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;

nav {
    border: 1px solid #000;
    height: 100vh;
    width: 300px;
    padding: 20px;

    &>ul {
        &>li {
            border-bottom: 1px solid rgba(0, 0, 0, .08);
        }
    }

    a {
        color: #00CCBC;
    }

    label {
        padding-left: 2px;
    }

    .info-place {
        @include flex(between);

        .place {
            @include flex(center);
            gap: 10px;
            line-height: 20px;

            .name {
                div {
                    font-weight: bold;
                }
            }

            .icon {
                .motorcycle {
                    font-size: 30px;
                }
            }
        }

    }

    .filters {
        height: 70vh;
        overflow-y: auto;

        .text {
            @include flex(between);
            font-weight: bold;

            span {
                color: #00CCBC;
            }
        }
    }

    ul {
        li {
            padding: 15px;
            margin-right: 10px;
        }
    }
}
</style>