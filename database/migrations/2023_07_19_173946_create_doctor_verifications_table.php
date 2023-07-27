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
        Schema::create('doctor_verifications', function (Blueprint $table) {
            $table->foreignid('user_id')->constrained()->onDelete('cascade');
            $table->string('years_of_experience');
            $table->string('speciality');
            $table->string('cv');
            $table->string('image');
            $table->string('phone_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_verifications');
    }
};
