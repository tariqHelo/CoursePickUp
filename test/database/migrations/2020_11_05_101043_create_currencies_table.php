<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titleEn');
            $table->string('titleAr');
            $table->string('code');
            $table->string('icon');
            $table->string('usd');
            $table->string('gbp');
            $table->string('eur');
            $table->string('cad');
            $table->string('aud');
            $table->string('nzd');
            $table->string('sar');
            $table->string('aed');
            $table->string('kwd');
            $table->string('omr');
            $table->string('bhd');
            $table->string('jod');
            $table->string('qar');
            $table->string('myr');
            $table->string('try');
            $table->string('egp');
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
        Schema::dropIfExists('currencies');
    }
}
