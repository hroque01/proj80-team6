<script>

export default {
    name: 'AppFaq'
}
</script>

<template>
    <section>
        <div class="my_container">

            <h2 class="main-title">Domande pi&uacute; frequenti</h2>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Che Tipo Di Ristoranti Trovo Su Deliveroo?
                    </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Ci prendiamo cura personalmente di proporti un'ampia selezione di ristoranti di alta qualità. Questo significa che puoi trovare dal miglior ristorante giapponese, all'hamburgheria più gustosa, alla pizzeria italiana tradizionale con forno a legna. L'unica cosa che non troverai su <span>Deliveboo</span> sono ristoranti di scarsa qualità.
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Se possiedo un account come ristoratore, dove posso trovare la lista completa dei piatti del mio men&uacute;&quest;
                    </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Una volta effettuato l'accesso al tuo <a href="http://localhost:8000/login">account</a> verrai reindirizzato alla dashboard, da cui potrai gestire i tuoi dati e inserire nuovi piatti, modificarne i nomi, le descrizioni e i prezzi.
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Se possiedo un account come ristoratore, come faccio a nascondere un piatto dal men&uacute; se &eacute; esaurito?
                    </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Una volta effettuato l'accesso al tuo <a href="http://localhost:8000/login">account</a> verrai reindirizzato alla dashboard, da cui potrai visualizzare il tuo men&uacute;. Cliccando sul tasto "Modifica", comparir&aacute; in schermata una pagina. Vai su "Vuoi che il piatto sia visibile nel menú?" e clicca "no". In questo modo il visitatore che visualizza la tua pagina, lo trover&aacute; "non dispobibile".
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

section{
    margin-bottom: 100px;

    .my_container{
        display: flex;
        flex-direction: column;
        align-items: center;

        .main-title{
            margin-bottom: 50px;
            color: $btn_red;
            font-weight: bold;
        }

        .accordion{
            width: 900px;
            --bs-accordion-btn-focus-box-shadow: 0 0 0 2px #ee5743;
            --bs-accordion-active-color: #ee5743;
            --bs-accordion-active-bg: #fff;
        }

        .accordion-body{
            span, a{
                color: $btn_red;
                font-weight: bold;
            }
        }

        .accordion-button:not(.collapsed)::after {
          color: none;
        }
    }
    
}
</style>