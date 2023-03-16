<script>

export default {
    name: 'AppData',
}
</script>

<template>
    Info Dati

    <form>
   
        <div class="flex-form">
            <label for="customer_name">Inserisci il tuo nome e cognome<span>*</span></label>
            <input type="text" placeholder="Mario Rossi" name="customer_name" required id="customer_name">
        </div>
        <div class="flex-form">
            <label for="address">Inserisci il tuo indirizzo<span>*</span></label>
            <input type="text" placeholder="Via Roma, 10" name="address" required id="address">
        </div>
        <div class="flex-form">
            <label for="email">Inserisci la tua email<span>*</span></label>
            <input type="email" placeholder="email@prova.it" name="email" required id="email">
        </div>
        <div class="flex-form">
            <label for="phone_number">Inserisci il tuo telefono<span>*</span></label>
            <input type="text" placeholder="3468888888" name="phone_number" required id="phone_number">
        </div>
        <input type="submit" value="Invia">
    </form>
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;

form{
    width: 600px;
    padding: 20px;
    display: flex;
    flex-direction: column;
    // debug
    border: 1px solid black;

    .flex-form{
        @include flex(between);
        margin: 10px 0;
        
        span{
            color: $btn_red;
        }

        input{
            padding: 5px;
            width: 55%;
        }
    }

    input[type="submit"]{
        align-self: center;
        margin-top: 10px;
        padding: 0 15px;
    }

}

</style>