<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeeksRangeMaterialFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weeksrangematerial_fees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('fromWeek');
            $table->integer('toWeek');
            $table->integer('fee');
            $table->biginteger('userId');
            $table->biginteger('course_id');
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
        Schema::dropIfExists('weeksrangematerial_fees');
    }
}
