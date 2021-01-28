<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fName')->nullable();
            $table->string('lName')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('nationality')->nullable();
            $table->string('placeOfResidence')->nullable();
            $table->string('notes')->nullable();
            $table->string('destination')->nullable();
            $table->string('invoice')->nullable();
            $table->string('device')->nullable();
            $table->string('currency')->nullable();
            $table->string('type');
            $table->string('institution')->nullable();
            $table->string('subject')->nullable();
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
        Schema::dropIfExists('leads');
    }
}
