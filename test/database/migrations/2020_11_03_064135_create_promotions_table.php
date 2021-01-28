<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('type');
            $table->integer('for');
            $table->integer('subFor')->default(1);
            $table->date('validDateFrom');
            $table->date('validDateTo');
            $table->date('courseBookingFrom');
            $table->date('courseBookingTo');
            $table->bigInteger('userId');
            $table->boolean('status')->defalt(0);
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
        Schema::dropIfExists('promotions');
    }
}
