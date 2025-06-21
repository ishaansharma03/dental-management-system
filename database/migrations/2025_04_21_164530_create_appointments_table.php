<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('appointments', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('patient_id');
        $table->string('treatment_type');
        $table->date('appointment_date');
        $table->time('appointment_time');
        $table->string('status')->default('Scheduled'); // Scheduled, Completed, Cancelled
        $table->timestamps();

        $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
