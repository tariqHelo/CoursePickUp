<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccommodationTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accommodationtypes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titleAr');
            $table->string('titleEn');
            $table->string('slugEn');
            $table->integer('status');
            $table->biginteger('userId');
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
        Schema::dropIfExists('accommodationtypes');
    }
}
