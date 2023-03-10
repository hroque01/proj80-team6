<script>

import { store } from '../store';

export default {
    name: 'AppFooter',
    data() {
        return {
            store,
        }
    }
}
</script>

<template>
    <!-- Footer -->
    <footer>
        <div class="my_container">
            <div class="links-footer">
                <!-- Titolo -->
                <h3>
                    Scopri deliveboo
                </h3>
                <!-- Lista links -->
                <ul>
                    <li>
                        <a href="/">Lorem ipsum</a>
                    </li>
                    <li>
                        <a href="/">Lorem ipsum</a>
                    </li>
                    <li>
                        <a href="/">Lorem ipsum</a>
                    </li>
                    <li>
                        <a href="/">Lorem ipsum</a>
                    </li>
                    <li>
                        <a href="/">Lorem ipsum</a>
                    </li>
                    <li>
                        <a href="/">Lorem ipsum</a>
                    </li>
                    <li>
                        <a href="/">Lorem ipsum</a>
                    </li>
                </ul>
            </div>

            <div class="links-footer">
                <!-- Titolo -->
                <h3>
                    Note legali
                </h3>
                <!-- Lista links -->
                <ul>
                    <li>
                        <a href="/">Lorem ipsum</a>
                    </li>
                    <li>
                        <a href="/">Lorem ipsum</a>
                    </li>
                    <li>
                        <a href="/">Lorem ipsum</a>
                    </li>
                    <li>
                        <a href="/">Lorem ipsum</a>
                    </li>
                </ul>
            </div>

            <div class="links-footer">
                <!-- Titolo -->
                <h3>
                    Aiuto
                </h3>
                <!-- Lista links -->
                <ul>
                    <li>
                        <a href="/">Contatti</a>
                    </li>
                    <li>
                        <a href="/">FAQ</a>
                    </li>
                    <li>
                        <a href="/">Lorem ipsum</a>
                    </li>
                </ul>
            </div>

            <div class="links-footer">
                <!-- Titolo -->
                <h3>
                    Porta deliveboo con te
                </h3>
                <!-- buttons -->
                <div class="my_buttons">
                    <div class="my_button" v-for="(button, index) in store.buttons" :key="index">
                        <div class="ms_icon">
                            <i :class="button.icon"></i>
                        </div>
                        <div class="smaller">
                            {{ button.textSmaller }}
                            <span class="bigger">{{ button.textBigger }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Parte sotto con social e copyright -->
            <div class="footer-bottom">
                <div class="socials">
                    <a href="/"><i class="fa-brands fa-facebook"></i></a>
                    <a href="/"><i class="fa-brands fa-twitter"></i></a>
                    <a href="/"><i class="fa-brands fa-instagram"></i></a>
                </div>

                <div class="copyright">
                    &copy; 2023 Deliveboo
                </div>
            </div>
        </div>
    </footer>
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;

footer {
    background-color: #2E3333;
    min-height: 380px;
    color: #fff;
    padding-top: 20px;

    .my_container {
        gap: 20px;
        @include flex(both);
        flex-wrap: wrap;
    }

    h3 {
        font-size: 20px;
        padding-bottom: 10px;
    }

    a {
        color: #fff;
        font-size: 15px;
        line-height: 30px;

        &:hover {
            color: #00CCBC;
        }
    }

    .links-footer {
        background-color: #434848;
        border-radius: 3px;
        height: 300px;
        width: calc(100% / 4 - 15px);
        padding: 15px 20px;

        .my_button {
            width: 150px;
            background-color: #000;
            color: #fff;
            line-height: 15px;
            margin-top: 15px;
            padding: 5px;
            @include flex(flex);

            .ms_icon {
                width: 30px;
                font-size: 30px;
            }

            .smaller {
                font-size: 13px;
                margin-left: 10px;
            }

            .bigger {
                font-size: 18px;
            }
        }
    }

    .footer-bottom {
        @include flex(both);
        width: 100%;

        .socials {

            a {
                margin: 0 10px;
                font-size: 20px;

                &:first-child {
                    margin-left: 0;
                }
            }
        }

    }
}
</style>
