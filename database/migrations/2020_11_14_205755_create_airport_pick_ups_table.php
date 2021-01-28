<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirportPickUpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airportpickup', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('school');
            $table->string('titleEn');
            $table->string('titleAr');
            $table->integer('roundWay');
            $table->integer('oneWay');
            $table->bigInteger('userId');
            $table->softDeletes();
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
        Schema::dropIfExists('airportpickup');
    }
}
