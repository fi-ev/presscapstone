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
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(false);
            $table->string('assignment_place')->nullable(false);
            $table->string('employment_type')->nullable(false);
            $table->string('plantilla_no')->nullable();
            $table->integer('salary_grade')->nullable(false);
            $table->decimal('monthly_salary', total: 8, places: 2)->default(0.00)->nullable(false);
            $table->text('description')->nullable()->default(null);
            $table->string('education')->nullable(false);
            $table->string('work_experience')->nullable(false);
            $table->string('trainings')->nullable(false);
            $table->string('competencies')->nullable(false);
            $table->string('eligibilities')->nullable(false);
            $table->boolean('is_active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
