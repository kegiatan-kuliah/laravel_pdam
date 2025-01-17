<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('monthly_readings')) {
            Schema::create('monthly_readings', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('meter_id');
                $table->date('reading_date');
                $table->unsignedBigInteger('previous_reading');
                $table->unsignedBigInteger('current_reading');
                $table->unsignedBigInteger('water_usage');
                $table->timestamps();

                $table->foreign('meter_id')->references('id')->on('water_meters')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthly_readings');
    }
};
