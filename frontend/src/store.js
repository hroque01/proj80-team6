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
    quantity: [],
    storedArray: [],
    length: localStorage.length
});