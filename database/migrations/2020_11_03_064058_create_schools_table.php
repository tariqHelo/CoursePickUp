<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titleAr');
            $table->string('titleEn');
            $table->string('slugAr');
            $table->string('slugEn');
            $table->integer('featuredMainPage');
            $table->integer('featuredCountryPage');
            $table->integer('featuredCityPage');
            $table->bigInteger('currency_id');
            $table->bigInteger('country_id');
            $table->bigInteger('city_id');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('logo');
            $table->integer('rating');
            $table->string('registrationFee');
            $table->integer('status');
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
        Schema::dropIfExists('schools');
    }
}
