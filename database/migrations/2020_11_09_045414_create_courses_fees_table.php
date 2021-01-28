<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coursesfees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('fromWeek');
            $table->integer('toWeek');
            $table->integer('fee');
            $table->biginteger('userId');
            $table->biginteger('course_id');
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
        Schema::dropIfExists('coursesfees');
    }
}
