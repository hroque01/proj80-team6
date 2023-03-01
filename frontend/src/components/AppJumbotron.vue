<script>
export default {
    name: 'AppJumbotron',
}
</script>

<template>
    <!-- classe da togliere quando avremo il vero jumbotron -->
    <div class="jumbotron">
        <div class="ms_content">
            <h1>Restaurant, food, takeaway, grocery. <span>Delivered</span>.</h1>
            <label for="" >Enter your address to see what we deliver</label>
            <input type="text" placeholder="es. Via di Boolean classe 80">
            <input type="submit" value="Search" class="search">
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
    .ms_content{
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

        label{
            display: block;
        }

        input{
            margin-top: 10px;
            width: 400px;
            padding: 10px;
            border-radius: 20px;
        }

        .search{
            width: 100px;
            margin-left: 10px;
            background-color: $btn-red;
            border: 1px solid $btn-red;
            color: #fff;
        }
    }
    

    
}
</style>