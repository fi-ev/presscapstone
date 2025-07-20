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
        Schema::create('applicant_eligibilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict');
            $table->foreignId('type_eligibility_id')->constrained('type_eligibilities')->onDelete('restrict');
            $table->string('rating')->nullable(false);
            $table->date('date_taken')->nullable(false);
            $table->string('place_taken')->nullable(false);
            $table->string('license_no')->nullable(false);
            $table->date('validity')->nullable(false);
            $table->foreignId('application_id')->nullable()->constrained('applications')->onDelete('restrict');
            $table->boolean('is_latest')->nullable(false)->default(1);
            $table->integer('version')->nullable(false)->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant_eligibilities');
    }
};
