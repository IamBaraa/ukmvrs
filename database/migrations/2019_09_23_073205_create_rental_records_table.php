<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('plate_no');
            $table->double('total_price', 8, 2);
            $table->double('profit', 8, 2);
            $table->string('email');
            $table->dateTime('rent_datetime');
            $table->dateTime('return_datetime');
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
        Schema::dropIfExists('rental_records');
    }
}
