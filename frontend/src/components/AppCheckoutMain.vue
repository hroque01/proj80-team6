<script>
import { store } from '../store';

export default {
    name: 'AppCheckoutMain',
    data() {
        return {
            opzioni: [false, false],
            cardNumber: '',
            scadenzaCarta: '',
            cvv: null,
            cap: null,
            store,
        };
    },
    methods: {
        selezione(index) {
            for (let i = 0; i < this.opzioni.length; i++) {
                if (i !== index) {
                    this.opzioni[i] = false;
                } else if (this.opzioni[index] === true) {
                    this.opzioni[index] = false;
                }
            }
        },
        validateCvv(event) {
            const input = event.target.value;
            // rimuovi eventuali caratteri non numerici
            const validatedInput = input.replace(/\D/g, "");
            // limita la lunghezza massima a 3 cifre
            this.cvv = validatedInput.slice(0, 3);
        },
        validateCap(event) {
            const input = event.target.value;
            // rimuovi eventuali caratteri non numerici
            const validatedInput = input.replace(/\D/g, "");
            // limita la lunghezza massima a 3 cifre
            this.cap = validatedInput.slice(0, 5);
        },
        validateScadenza() {
            this.scadenzaCarta = this.scadenzaCarta.replace(/[^0-9]/g, ''); // rimuovi tutti i caratteri non numerici
            const month = this.scadenzaCarta.slice(0, 2);
            if (month > 12) {
                this.scadenzaCarta = '12 / ' + this.scadenzaCarta.slice(2); // se il mese è maggiore di 12, imposta il valore massimo (12)
            } else if (this.scadenzaCarta.length > 2) {
                this.scadenzaCarta = month + ' / ' + this.scadenzaCarta.slice(2); // altrimenti, formatta il valore della data come MM / AA
            }
        },
        formatCartNumber(cardNumber) {
            // Rimuovi eventuali spazi dal numero della carta di credito
            const cardNumberWithoutSpaces = cardNumber.replace(/\s/g, '');
            // Dividi il numero della carta di credito in gruppi di 4 cifre
            const cardNumberGroups = cardNumberWithoutSpaces.match(/.{1,4}/g);
            // Unisci i gruppi di 4 cifre con gli spazi
            return cardNumberGroups ? cardNumberGroups.join(' ') : '';
        },
        onCardNumberInput(event) {
            // Ottieni il valore dell'input
            let cardNumber = event.target.value;
            // Formatta il numero della carta di credito
            cardNumber = this.formatCartNumber(cardNumber);
            // Aggiorna il valore dell'input
            this.cardNumber = cardNumber;
        },
        emptyCart() {
            localStorage.clear();
            store.length = 0;
        }
    }
}

</script>

<template>
    <!-- main section  -->
    <main class="pt-5 pb-3">
        <div class="my_container">
            <div class="row">
                <h3 class="col">
                    <b>Controlla il tuo ordine da U Sushi 8</b>
                </h3>
            </div>
            <div class="row mt-4">
                <h5 class="col pt-3">
                    <b>Come vuoi pagare?</b>
                </h5>
            </div>

            <div class="row mt-4">
                <div class="col-8">
                    <div class="card px-3">
                        <div class="card-body d-flex justify-content-between align-items-center px-0">
                            <label class="col-10 form-check-label pointer" @click="selezione(0)">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="" v-model="this.opzioni[0]">
                                    <span class="m-2">
                                        <b>Paga con carta di debito o credito</b> <br>
                                        <span>Inserisci i dettagli della carta</span>
                                    </span>
                                </div>
                            </label>
                            <div class="cards">

                            </div>

                        </div>
                        <div v-if="opzioni[0]" class="mb-3">
                            <form>
                                <div class="form-group">
                                    <label for="numeroCarta">Numero Carta</label>
                                    <input type="text" class="form-control" id="card-number" v-model="cardNumber"
                                        @input="onCardNumberInput" placeholder="Inserisci il numero della tua carta"
                                        maxlength="19" />
                                </div>
                                <div class="form-group">
                                    <label for="scadenzaCarta">Scadenza</label>
                                    <input type="text" class="form-control" :class="{ 'is-invalid': isExpired }"
                                        id="scadenzaCarta" v-model="scadenzaCarta" @input="validateScadenza"
                                        placeholder="MM / AA" maxlength="7">
                                </div>
                                <div class="form-group">
                                    <label for="cvv">CVV</label>
                                    <input type="text" class="form-control" id="id" placeholder="CVV" v-model="cvv"
                                        @input="validateCvv" />
                                </div>
                                <div class="form-group">
                                    <label for="capCarta">CAP di Fatturazione</label>
                                    <input type="text" class="form-control" id="capCarta" placeholder="Inserisci il tuo CAP"
                                        v-model="cap" @input="validateCap" />
                                </div>
                            </form>
                        </div>

                        <hr class="border-top border-dark">

                        <div class="card-body d-flex justify-content-between align-items-center px-0">
                            <label class="col-10 form-check-label pointer" @click="selezione(1)">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="" v-model="this.opzioni[1]">
                                    <span class="m-2">
                                        <b>Contanti</b> <br>
                                        <span>Se puoi, prepara l'importo preciso. I Rider non possono accettare banconote
                                            sopra i €50.</span>
                                    </span>
                                </div>
                            </label>
                            <div class="cash">

                            </div>
                        </div>

                    </div>
                    <h5 class="col mt-5 mb-2">
                        <b>Dettagli consegna</b>
                    </h5>
                    <div class="card px-3 mb-4">
                        <div class="card-body px-0">
                            <span>BIC</span><b class="p-2">Consegna fra circa 45 min</b>
                        </div>
                    </div>
                    <h5 class="col py-3 d-flex justify-content-center align-items-center payButton">
                        <b>Ordina per la consegna</b>
                    </h5>
                </div>
                <div class="col-4">
                    <div class="card px-3 mb-4 py-2">
                        <h5 class="card-body px-0 py-2">
                            <b>Carrello</b>
                        </h5>
                        <button @click="emptyCart">Svuota carrello</button>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div>1x A2. Zuppa di pollo con Mais</div>
                            <div>4,00 €</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div>1x P5. Yaki udon fish</div>
                            <div>6,00 €</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div>1x S19. Verdure miste saltato</div>
                            <div>6,00 €</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div>1x A4. Wakame</div>
                            <div>5,00 €</div>
                        </div>
                        <hr class="border-top border-dark mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div>Subtotale</div>
                            <div>21,00 €</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div>Spese di consegna</div>
                            <div>5,00 €</div>
                        </div>
                        <hr class="border-top border-dark mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div><b>Totale</b></div>
                            <div><b>26,00 €</b></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;

main {
    background-color: rgb(249, 250, 250);
}

.cards {
    width: 80px;
    height: 30px;
    background-color: black;
}

.expired {
    color: red;
}

.is-invalid {
    border-color: #dc3545;
}

.cash {
    width: 30px;
    height: 30px;
    background-color: black;
}

.payButton {
    background-color: rgb(0, 204, 188);
    border-radius: 5px;
    cursor: pointer;
}

.payButton:hover {
    background-color: rgb(0, 194, 179);
}

.pointer:hover {
    cursor: pointer;
}
</style>