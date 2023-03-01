<script>
export default {
    name: 'AppJumbotron',
}
</script>

<template>
    <!-- classe da togliere quando avremo il vero jumbotron -->
    <div class="jumbotron">
        <div class="ms_title">
            <h1>Restaurant, food, takeaway, grocery. <span>Delivered</span>.</h1>
            <span>Enter your address to see what we deliver</span>
        </div>

        
    </div>
</template>

<style lang="scss" scoped>
@use '../src/styles/general.scss' as *;
@use '../src/styles/partials/mixins' as *;
@use '../src/styles/partials/variables' as *;

.jumbotron{
    color: #fff;
    width: 100%;
    height: 440px;
    background-color: #000;
    position: relative;
    .ms_title{
        text-align: center;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        
        h1{
            text-align: center;
            color:#fff;
            margin-bottom: 10px;

            span{
                color: $btn-red;
            }
        }
    }
    

    
}
</style>