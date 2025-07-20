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
        Schema::create('list_provinces', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable()->default(null);
            $table->string('name')->nullable()->default(null);
            $table->string('region_code')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_provinces');
    }
};
