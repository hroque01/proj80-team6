<script>

export default {
    name: 'AppData',
}
</script>

<template>
    Info Dati

    <form action="">
        <div>
            <label for="">Inserisci il tuo nome e cognome*</label>
            <input type="text" placeholder="Mario Rossi">
        </div>
        <div>
            <label for="">Inserisci il tuo indirizzo*</label>
            <input type="text" placeholder="Via Roma, 10">
        </div>
        <div>
            <label for="">Inserisci il tuo nome</label>
            <input type="text">
        </div>
        <div>
            <label for="">Inserisci il tuo nome</label>
            <input type="text">
        </div>
        
    </form>
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;
</style>