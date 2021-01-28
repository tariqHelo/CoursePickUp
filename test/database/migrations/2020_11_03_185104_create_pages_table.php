<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titleEn');
            $table->string('titleAr');
            $table->string('slugEn');
            $table->string('slugAr');
            $table->string('image');
            $table->text('contentAr');
            $table->text('contentEn');
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
        Schema::dropIfExists('pages');
    }
}
