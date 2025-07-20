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
        Schema::create('applicant_attachments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict');
            $table->string('type')->nullable(false);
            $table->string('model')->nullable(false);
            $table->string('path')->nullable(false);
            $table->string('filename')->nullable(false);
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
        Schema::dropIfExists('application_attachments');
    }
};
