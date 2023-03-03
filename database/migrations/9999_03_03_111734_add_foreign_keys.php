<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //FK restaurant_typology
        Schema::table('restaurant_typology', function (Blueprint $table) {
            $table->foreignId('restaurant_id')
                -> constrained();
            $table->foreignId('typology_id')
                -> constrained();
        });

        //FK dishes
        Schema::table('dishes', function (Blueprint $table) {
            $table->foreignId('restaurant_id')
                -> constrained();
        });

        //FK orders
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('restaurant_id')
                -> constrained();
        });

        //FK dish_order
        Schema::table('dish_order', function (Blueprint $table) {
            $table->foreignId('dish_id')
                -> constrained();
            $table->foreignId('order_id')
                -> constrained();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
