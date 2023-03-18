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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->date('create_date');
            $table->time('create_time');
            $table->string('order_number');
            $table->decimal('total') -> unsigned();
            $table->string('customer_name');
            $table->string('address');
            $table->string('email');
            $table->string('phone_number');
            $table->boolean('completed');

            $table->string('card_number')->unique();
            $table->string('expiration_date');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
