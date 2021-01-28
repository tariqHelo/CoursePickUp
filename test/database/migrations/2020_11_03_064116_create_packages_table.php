<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('country_id');
            $table->bigInteger('city_id');
            $table->bigInteger('school_id');
            $table->bigInteger('courseType_id');
            $table->string('lessonWeek');
            $table->string('duration');
            $table->string('accommodationType');
            $table->bigInteger('roomType_id');
            $table->bigInteger('mealsType_id');
            $table->string('airportPickUp');
            $table->string('healthInsurance');
            $table->string('studentVisa');
            $table->string('featured');
            $table->string('fee');
            $table->string('feeDiscount');
            $table->string('otherType')->nullable();
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
        Schema::dropIfExists('packages');
    }
}
