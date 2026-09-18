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
            $table->foreignUuid('topic_id')
                ->constrained('topics')
                ->onDelete('cascade');
            $table->foreignUuid('question_id')
                ->constrained('questions')
                ->onDelete('cascade');
            $table->timestamp('answered_at');

            $table->index(
                ['user_id', 'topic_id'],
                'answered_questions_user_topic_index'
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
