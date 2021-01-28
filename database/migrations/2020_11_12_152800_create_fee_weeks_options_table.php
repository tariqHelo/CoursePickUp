<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeWeeksOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeweeksoptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('fee')->nullable();
            $table->integer('toWeek')->nullable();
            $table->integer('fromWeek')->nullable();
            $table->integer('option')->nullable();
            $table->bigInteger('userId')->nullable();
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
        Schema::dropIfExists('feeweeksoptions');
    }
}
