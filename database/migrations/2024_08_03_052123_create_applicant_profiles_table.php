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
        Schema::create('applicant_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict');
            $table->string('first_name')->nullable()->default(null);
            $table->string('middle_name')->nullable()->default(null);
            $table->string('last_name')->nullable()->default(null);
            $table->string('name_ext')->nullable()->default(null);
            $table->date('birthdate')->nullable()->default(null);
            $table->string('birthplace')->nullable()->default(null);
            $table->enum('sex', ['Male','Female'])->default('Male')->nullable()->default(null);;
            $table->enum('civil_status', ['Single','Married','Legally Separated','Divorced','Widowed','Other'])->default('Single')->nullable()->default(null);;
            $table->decimal('height', total: 5, places: 2)->nullable()->default(null);;
            $table->decimal('weight', total: 5, places: 2)->nullable()->default(null);;
            $table->char('blood_type')->nullable()->default(null);;
            $table->string('gsis_no')->nullable()->default(null);
            $table->string('pagibig_no')->nullable()->default(null);
            $table->string('philhealth_no')->nullable()->default(null);
            $table->string('sss_no')->nullable()->default(null);
            $table->string('tin_no')->nullable()->default(null);
            $table->string('employee_no')->nullable()->default(null);
            $table->string('citizenship')->nullable()->default(null);
            $table->string('dual_details')->nullable()->default(null);
            $table->string('dual_country')->nullable()->default(null);
            $table->string('residential_house_no')->nullable()->default(null);
            $table->string('residential_street')->nullable()->default(null);
            $table->string('residential_village')->nullable()->default(null);
            $table->string('residential_barangay')->nullable()->default(null);
            $table->string('residential_municity')->nullable()->default(null);
            $table->string('residential_province')->nullable()->default(null);
            $table->string('permanent_house_no')->nullable()->default(null);
            $table->string('permanent_street')->nullable()->default(null);
            $table->string('permanent_village')->nullable()->default(null);
            $table->string('permanent_barangay')->nullable()->default(null);
            $table->string('permanent_municity')->nullable()->default(null);
            $table->string('permanent_province')->nullable()->default(null);
            $table->string('phone_no')->nullable()->default(null);
            $table->string('mobile_no', 15)->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
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
        Schema::dropIfExists('applicant_profiles');
    }
};
