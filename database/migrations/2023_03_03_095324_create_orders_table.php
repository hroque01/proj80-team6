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

            $table->time('create_time');
            $table->string('order_number');
            $table->decimal('total');
            $table->string('customer_name', 32);
            $table->string('customer_surname', 32);
            $table->string('address', 64);
            $table->string('email', 64);
            $table->string('phone_number', 32);

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
