<?php

use App\Enums\DoctorStatus;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('doctor_verifications', function (Blueprint $table) {
            $table->string('status')->default(DoctorStatus::PROCESSING->value);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('doctor_verifications', function (Blueprint $table) {
            //
        });
    }
};
