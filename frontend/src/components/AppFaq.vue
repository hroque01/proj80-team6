<script>

export default {
    name: 'AppFaq'
}
</script>

<template>
    <section>
        <div class="my_container">

            <h2 class="main-title">Domande pi&ugrave; frequenti</h2>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Che Tipo Di Ristoranti Trovo Su Deliveroo?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Ci prendiamo cura personalmente di proporti un'ampia selezione di ristoranti di alta
                            qualit&agrave;. Questo significa che puoi trovare dal miglior ristorante giapponese,
                            all'hamburgheria pi&ugrave; gustosa, alla pizzeria italiana tradizionale con forno a legna.
                            L'unica cosa che non troverai su <span>Deliveboo</span> sono ristoranti di scarsa
                            qualit&agrave;.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Se possiedo un account come ristoratore, dove posso trovare la lista completa dei piatti del mio
                            men&ugrave;&quest;
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Una volta effettuato l'accesso al tuo <a href="http://localhost:8000/login">account</a> verrai
                            reindirizzato alla dashboard, da cui potrai gestire i tuoi dati e inserire nuovi piatti,
                            modificarne i nomi, le descrizioni e i prezzi.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Se possiedo un account come ristoratore, come faccio a nascondere un piatto dal men&ugrave; se
                            &egrave; esaurito&quest;
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Una volta effettuato l'accesso al tuo <a href="http://localhost:8000/login">account</a> verrai
                            reindirizzato alla dashboard, da cui potrai visualizzare il tuo men&ugrave;. Cliccando sul tasto
                            "Modifica", comparir&agrave; in schermata una pagina. Vai su "Vuoi che il piatto sia visibile
                            nel men&ugrave;&quest;" e clicca "no". In questo modo il visitatore che visualizza la tua
                            pagina, lo
                            trover&agrave; "non disponibile".
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;

section {
    margin-bottom: 50px;

    .my_container {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 700px;

        .main-title {
            margin-bottom: 50px;
            color: $btn_red;
            font-weight: bold;
        }

        .accordion {
            width: 100%;
            --bs-accordion-btn-focus-box-shadow: 0 0 0 2px #ee5743;
            --bs-accordion-active-color: #ee5743;
            --bs-accordion-active-bg: #fff;
        }

        .accordion-body {

            span,
            a {
                color: $btn_red;
                font-weight: bold;
            }
        }

        .accordion-button:not(.collapsed)::after {
            color: none;
        }
    }

}

@media only screen and (max-width: 740px) {

    section{
        .my_container{
            width: 95%;
        }

    }

}
</style>