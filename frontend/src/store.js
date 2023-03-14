import { reactive } from 'vue'

export const store = reactive({
    buttons: [
        {
            icon: "fa-brands fa-apple",
            textSmaller: "Donwload on the ",
            textBigger: "App Store"
        },
        {
            icon: "fa-brands fa-google-play",
            textSmaller: "GET IT ON ",
            textBigger: "Google Play"
        },
    ],
    restaurants: [
        'aubergine-pizza.jpg',
        'avocado-toast.jpg',
        'cappuccino.jpg',
        'corona-beer.jpg',
        'donuts.jpg',
        'green-sushi.jpg',
        'hamburger.jpg',
        'macarons.jpg',
        'meat-skewer.jpg',
        'pennette.jpg',
        'round-vegetables.jpg',
        'soup.jpg',
        'spaghetti-chinese.jpg',
        'sushi.jpg',
        'vegetables.jpg',
    ],
    quantity: [],
    length: localStorage.length,
    total: 0,
});