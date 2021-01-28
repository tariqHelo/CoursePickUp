<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titleAr');
            $table->string('titleEn');
            $table->string('slugAr');
            $table->string('slugEn');
            $table->string('metaDescriptionEn');
            $table->string('metaDescriptionAr');
            $table->string('pageTitleAr');
            $table->string('pageTitleEn');
            $table->string('image');
            $table->text('contentEn');
            $table->text('contentAr');
            $table->integer('featured');
            $table->integer('status');
            $table->boolean('en')->default(1);
            $table->boolean('ar')->default(1);
            $table->timestamp('date');
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
        Schema::dropIfExists('articles');
    }
}
