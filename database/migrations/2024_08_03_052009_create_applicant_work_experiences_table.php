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
        Schema::create('applicant_work_experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict');
            $table->date('start_date')->nullable(false);
            $table->date('end_date')->nullable(false);
            $table->string('position')->nullable(false);
            $table->string('company')->nullable(false);
            $table->decimal('monthly_salary', total: 8, places: 2)->nullable(false);
            $table->string('salary_grade')->nullable(false);
            $table->enum('appointment_status', ['N/A','Job Order','Contractual','Temporary','Permanent'])->default('N/A');
            $table->boolean('is_govt_service')->nullable(false);
            $table->foreignId('application_id')->nullable()->constrained('applications')->onDelete('restrict');
            $table->boolean('is_latest')->nullable()->default(1);
            $table->boolean('version')->nullable()->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant_work_experiences');
    }
};
