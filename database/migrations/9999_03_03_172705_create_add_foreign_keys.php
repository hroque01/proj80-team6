<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Relation 1 to 1
        Schema::table('users', function (Blueprint $table) {

            $table->primary('restaurant_id');

            $table->foreignId('restaurant_id')
                ->constrained();
        });


        //  si elimina un utente dalla tabella "users", tutti i ristoranti associati a quell'utente vengono eliminati automaticamente dalla tabella "restaurants". Questo significa che non ci saranno ristoranti "orfani" nella tabella "restaurants" senza proprietario.
        // Schema::table('restaurants', function (Blueprint $table) {
        //     $table->foreignId('user_id')->constrained()->onDelete('cascade');
        // });

        // Relation M to M
        Schema::table('restaurant_typology', function (Blueprint $table) {
            $table->foreignId('restaurant_id')
                ->constrained();

            $table->foreignId('typology_id')
                ->constrained();
        });

        // Relation 1 to M
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('restaurant_id')
                ->constrained();
        });

        // Relation M to M
        Schema::table('dish_order', function (Blueprint $table) {
            $table->foreignId('dish_id')
                ->constrained();

            $table->foreignId('order_id')
                ->constrained();

        });

        // Relation 1 to M
        Schema::table('dishes', function (Blueprint $table) {
            $table->foreignId('restaurant_id')
                ->constrained();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        //DROP FK restaurants
        Schema::table('users', function (Blueprint $table) {

            $table->dropForeign('users_restaurant_id_foreign');
            $table->dropColumn('restaurant_id');
        });

        //DROP FK restaurant_typology
        Schema::table('restaurant_typology', function (Blueprint $table) {
            $table->dropForeign('restaurant_typology_restaurant_id_foreign');
            $table->dropColumn('restaurant_id');
            $table->dropForeign('restaurant_typology_typology_id_foreign');
            $table->dropColumn('typology_id');
        });

        //DROP FK orders
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_restaurant_id_foreign');
            $table->dropColumn('restaurant_id');
        });

        //DROP FK dish_order
        Schema::table('dish_order', function (Blueprint $table) {
            $table->dropForeign('dish_order_dish_id_foreign');
            $table->dropColumn('dish_id');
            $table->dropForeign('dish_order_order_id_foreign');
            $table->dropColumn('order_id');
        });

        //DROP FK dishes
        Schema::table('dishes', function (Blueprint $table) {
            $table->dropForeign('dishes_restaurant_id_foreign');
            $table->dropColumn('restaurant_id');
        });
    }
};