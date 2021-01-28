<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('booking_id')->unique();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->integer('nationality_id')->nullable();
            $table->integer('residence_id')->nullable();
            $table->text('notes')->nullable();
            $table->timestamp('start_date');
            $table->integer('weeks');
            $table->integer('school_id');
            $table->integer('course_id');
            $table->integer('feeweeksoptions_id')->nullable(); //accomomdation fee record
            $table->integer('accommodation_weeks')->nullable();
            $table->integer('airportPickUp_id')->nullable();
            $table->integer('airportPickUp_type')->nullable();
            $table->integer('insurance_id')->nullable();
            $table->integer('visa_id')->nullable();
            $table->text('promotions')->nullable();
            $table->text('extra_weeks')->nullable();
            $table->text('discount_weeks')->nullable();
            $table->float('total', 20, 2);
            $table->string('invoice');
            $table->integer('device')->nullable();
            $table->string('lang')->default('en');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('bookings');
    }
}
