<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('plate_no')->unique();
            $table->string('email')->nullable()->default(NULL);
            $table->integer('user_id')->unique();
            $table->string('manufacturer');
            $table->integer('production_year');
            $table->string('model');
            $table->string('type');
            $table->string('ads')->default('No');
            $table->double('price_per_day', 8, 2);
            $table->double('price_per_hour', 8, 2);
            $table->double('total_profits', 8, 2);
            $table->string('availability');
            $table->string('images');
            $table->integer('leasing_times')->nullable()->default(NULL);
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
        Schema::dropIfExists('vehicles');
    }
}
