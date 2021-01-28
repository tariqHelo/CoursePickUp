<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coursesSchools', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titleAr');
            $table->string('titleEn');
            $table->string('slugAr');
            $table->string('slugEn');
            $table->bigInteger('school_id');
            $table->integer('maxStudents');
            $table->string('minAge');
            $table->string('hoursPerWeek');
            $table->string('lessonsPerWeek');
            $table->integer('courseType_id');
            $table->integer('minBookingWeeks');
            $table->string('courierFees')->nullable();
            $table->bigInteger('materialFeeType_id');
            $table->integer('materialFeeAmount')->nullable();
            $table->integer('requiredLevel');
            $table->integer('status');
            $table->boolean('featuredSchoolPage')->default(0);
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
        Schema::dropIfExists('coursesSchools');
    }
}
