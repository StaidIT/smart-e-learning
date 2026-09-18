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
        Schema::create('user_pretest', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table->foreignUuid('subject_id')
                ->constrained('subjects')
                ->onDelete('cascade');
            $table->foreignUuid('module_id')
                ->constrained('modules')
                ->onDelete('cascade');
            $table->enum('status', ['current', 'passed', 'locked'])
                ->default('locked');
            // $table->Boolean('has_coding')->default(false);
            // $table->Boolean('has_question_type')->default(false);
            $table->Boolean('coding_passed')->default(false);
            $table->Boolean('questions_type_passed')->default(false);
            $table->integer('scored')->default(0);
            $table->timestamps();

            $table->index(
                ['user_id', 'module_id'],
                'user_pretest_user_module_index'
            );

            $table->index(
                ['user_id', 'subject_id'],
                'user_pretest_user_subject_index'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_pretest');
    }
};
