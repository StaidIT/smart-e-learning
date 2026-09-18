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
        Schema::create('choices', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('question_id')
                ->references('id')
                ->on('questions')
                ->onDelete('cascade');
            $table->text('choice_A')->nullable();
            $table->text('choice_B')->nullable();
            $table->text('choice_C')->nullable();
            $table->text('choice_D')->nullable();
            $table->timestamps();

            $table->index(
                'question_id',
                'choices_question_id_index'
            );
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('choices');
    }
};
