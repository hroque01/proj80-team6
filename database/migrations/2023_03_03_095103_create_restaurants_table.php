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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();

            $table->text('description')->nullable();
            $table->time('opening_time')->required();
            $table->time('closure_time')->required();
            $table->boolean('delivery')->default(true);
            $table->decimal('delivery_price')->unsigned()->required();
            $table->time('delivery_time')->required();
            $table->string('image')->required();

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
        Schema::dropIfExists('restaurants');
    }
};