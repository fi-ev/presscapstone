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
        Schema::create('applicant_families', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict');
            $table->string('spouse_first_name')->nullable()->default(null);
            $table->string('spouse_middle_name')->nullable()->default(null);
            $table->string('spouse_last_name')->nullable()->default(null);
            $table->string('spouse_name_ext')->nullable()->default(null);
            $table->string('spouse_occupation')->nullable()->default(null);
            $table->string('spouse_work_employer')->nullable()->default(null);
            $table->string('spouse_work_address')->nullable()->default(null);
            $table->string('spouse_work_phone')->nullable()->default(null);
            $table->string('father_first_name')->nullable()->default(null);
            $table->string('father_middle_name')->nullable()->default(null);
            $table->string('father_last_name')->nullable()->default(null);
            $table->string('father_name_ext')->nullable()->default(null);
            $table->string('mother_first_name')->nullable()->default(null);
            $table->string('mother_maiden_middle_name')->nullable()->default(null);
            $table->string('mother_maiden_last_name')->nullable()->default(null);
            $table->foreignId('application_id')->nullable()->constrained('applications')->onDelete('restrict');
            $table->boolean('is_latest')->nullable(false)->default(1);
            $table->integer('version')->nullable(false)->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant_families');
    }
};
