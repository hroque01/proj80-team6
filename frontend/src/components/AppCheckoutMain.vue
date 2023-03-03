<script>
export default {
    name: 'AppCheckoutMain',
    data() {
    return {
      opzioni: [false, false],
    };
  },
  methods: {
    deselezionaAltre(index) {
      for (let i = 0; i < this.opzioni.length; i++) {
        if (i !== index) {
          this.opzioni[i] = false;
        }
      }
    },
  },
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
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" value="" v-model="opzioni[0]" @change="deselezionaAltre(0)">
                                <label class="form-check-label m-2">
                                  <b>Paga con carta di debito o credito</b> <br>
                                    <span>Inserisci i dettagli della carta</span> 
                                </label>
                              </div>
                              <div class="cards">

                              </div>
                        </div>
                        <hr class="border-top border-dark">
                        <div class="card-body d-flex justify-content-between align-items-center px-0">
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" value="" v-model="opzioni[1]" @change="deselezionaAltre(1)">
                                <label class="form-check-label m-2">
                                  <b>Contanti</b> <br>
                                    <span>Se puoi, prepara l'importo preciso. I Rider non possono accettare banconote sopra i €50.</span> 
                                </label>
                              </div>
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

</style>