<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultiPromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multipromotions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('promotion');
            $table->string('titleAr');
            $table->string('titleEn');
            $table->bigInteger('school');
            $table->integer('amount');
            $table->integer('bookingDurationFrom');
            $table->integer('bookingDurationTo');
            $table->integer('status');
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
        Schema::dropIfExists('multipromotions');
    }
}
