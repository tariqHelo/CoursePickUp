<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentschoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contentschools', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('school_id');
            $table->text('shortDescriptionEn')->nullable();
            $table->text('shortDescriptionAr')->nullable();
            $table->text('headingEn')->nullable();
            $table->text('headingAr')->nullable();
            $table->text('descriptionEn')->nullable();
            $table->text('descriptionAr')->nullable();
            $table->string('pageTitleEn');
            $table->string('pageTitleAr');
            $table->text('metaDescriptionEn');
            $table->text('metaDescriptionAr');
            $table->string('slugAr');
            $table->string('slugEn');
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
        Schema::dropIfExists('contentschools');
    }
}
