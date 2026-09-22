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
        Schema::create('test_cases', function (Blueprint $table) {
            $table->id();

            $table->foreignUuid('question_id')
                ->references('id')
                ->on('questions')
                ->onDelete('cascade');

            $table->text('scanner_input')->nullable();
            $table->text('expected_output');

            $table->unsignedInteger('test_case_order')->default(1);
            $table->boolean('is_hidden')->default(false);

            $table->timestamps();

            $table->index(
                'question_id',
                'test_cases_question_id_index'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_cases');
    }
};