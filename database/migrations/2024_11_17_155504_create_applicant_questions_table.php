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
        Schema::create('applicant_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict');
            $table->boolean('consanguinity_third')->nullable()->default(null);
            $table->string('consanguinity_fourth')->nullable()->default(null);
            $table->string('consanguinity_details')->nullable()->default(null);
            $table->boolean('admin_offense')->nullable()->default(null);
            $table->string('admin_offense_details')->nullable()->default(null);
            $table->boolean('criminal_court')->nullable()->default(null);
            $table->string('criminal_court_details')->nullable()->default(null);
            $table->string('criminal_court_filed')->nullable()->default(null);
            $table->string('criminal_court_status')->nullable()->default(null);
            $table->boolean('convicted_crime')->nullable()->default(null);
            $table->string('convicted_crime_details')->nullable()->default(null);
            $table->boolean('service_separated')->nullable()->default(null);
            $table->string('service_separated_details')->nullable()->default(null);
            $table->boolean('candidate')->nullable()->default(null);
            $table->string('candidate_details')->nullable()->default(null);
            $table->boolean('campaign')->nullable()->default(null);
            $table->string('campaign_details')->nullable()->default(null);
            $table->boolean('immigrant')->nullable()->default(null);
            $table->string('immigrant_details')->nullable()->default(null);
            $table->boolean('ip')->nullable()->default(null);
            $table->string('ip_details')->nullable()->default(null);
            $table->boolean('pwd')->nullable()->default(null);
            $table->string('pwd_details')->nullable()->default(null);
            $table->boolean('solo_parent')->nullable()->default(null);
            $table->string('solo_parent_details')->nullable()->default(null);
            $table->string('reference1_name')->nullable()->default(null);
            $table->string('reference1_address')->nullable()->default(null);
            $table->string('reference1_contact_no')->nullable()->default(null);
            $table->string('reference2_name')->nullable()->default(null);
            $table->string('reference2_address')->nullable()->default(null);
            $table->string('reference2_contact_no')->nullable()->default(null);
            $table->string('reference3_name')->nullable()->default(null);
            $table->string('reference3_address')->nullable()->default(null);
            $table->string('reference3_contact_no')->nullable()->default(null);
            $table->string('govt_id')->nullable()->default(null);
            $table->string('govt_id_no')->nullable()->default(null);
            $table->string('govt_id_issuance')->nullable()->default(null);
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
        Schema::dropIfExists('applicant_questions');
    }
};
