<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titleEn');
            $table->string('titleAr');
            $table->string('pageTitleAr');
            $table->string('pageTitleEn');
            $table->string('icon');
            $table->string('shortDescriptionAr');
            $table->string('shortDescriptionEn');
            $table->string('slugEn');
            $table->string('slugAr');
            $table->string('image');
            $table->text('contentEn');
            $table->text('contentAr');
            $table->bigInteger('userId');
            $table->string('brochure');
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
        Schema::dropIfExists('services');
    }
}
