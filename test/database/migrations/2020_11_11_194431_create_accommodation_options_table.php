<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccommodationOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accommodationOptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('accommodationType_id');
            $table->integer('roomType_id');
            $table->integer('mealType_id');
            $table->integer('facilitie_id');
            $table->string('supplement');
            $table->string('supplementAr');
            $table->integer('minimumNumberOfWeeksToBook');
            $table->string('accommodationAge');
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
        Schema::dropIfExists('accommodationOptions');
    }
}
