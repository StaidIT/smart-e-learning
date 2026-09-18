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
        Schema::create('questions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('module_id')
                ->references('id')
                ->on('modules')
                ->onDelete('cascade');
            $table->text('question');
            $table->enum('question_type',['TorF', 'multipleChoice', 'identification', 'coding']);
            $table->text('answer');
            $table->text('explanation')->nullable();
            $table->integer('points')->default(1);
            $table->timestamps();

            $table->index(
                'module_id',
                'questions_module_id_index'
            );

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
