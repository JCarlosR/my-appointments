<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCancelledAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cancelled_appointments', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('appointment_id'); 
            $table->foreign('appointment_id')->references('id')->on('appointments');

            $table->string('justification')->nullable();
            
            $table->unsignedInteger('cancelled_by');
            $table->foreign('cancelled_by')->references('id')->on('users');

            $table->timestamps(); // created_at (cancelled_at), updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cancelled_appointments');
    }
}
