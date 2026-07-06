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
        Schema::create('conversion_histories', function (Blueprint $table) {
            $table->id();
            $table->string('original_filename');
            $table->string('converted_filename')->nullable();
            $table->string('type_conversion'); // e.g., word_to_pdf
            $table->integer('file_size_kb')->nullable();
            $table->enum('status', ['pending', 'ai_processing', 'success', 'failed'])->default('pending');
            $table->text('ai_summary')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversion_histories');
    }
};
