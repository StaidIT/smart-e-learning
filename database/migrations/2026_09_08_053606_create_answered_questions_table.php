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
        Schema::create('answered_questions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignUuid('module_id')
                ->references('id')
                ->on('modules')
                ->onDelete('cascade');
            $table->foreignUuid('question_id')
                ->references('id')
                ->on('questions')
                ->onDelete('cascade');
            
            $table->timestamp('answered_at');

            $table->index(
                ['user_id', 'module_id'],
                'answered_questions_user_module_index'
            );

            $table->index(
                ['user_id', 'question_id'],
                'answered_questions_user_question_index'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answered_questions');
    }
};
