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
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('vacancy_code')->nullable()->default(null);
            $table->foreignId('position_id')->constrained('positions')->onDelete('restrict');
            $table->date('posting_date')->nullable(false);
            $table->date('closing_date')->nullable(false);
            $table->string('remarks')->nullable();
            $table->string('filepath')->nullable()->default(null);
            $table->string('filename')->nullable()->default(null);
            $table->string('url')->nullable()->default(null);
            $table->enum('status',['Open', 'Closed', 'Ongoing Deliberation', 'Filled'])->default('Open')->nullable(false);
            $table->text('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};
